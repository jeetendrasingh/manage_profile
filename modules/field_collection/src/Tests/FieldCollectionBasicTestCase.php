<?php

/**
 * @file
 * Definition of Drupal\field_collection\Tests\FieldCollectionBasicTestCase.
 */

namespace Drupal\field_collection\Tests;
use Drupal\simpletest\WebTestBase;

// TODO: Test field collections with no fields or with no data in their fields
//       once it's determined what is a good behavior for that situation.
//       Unless something is changed the Entity and the field entry for it
//       won't get created unless some data exists in it.

/**
 * Test basics.
 *
 * @group field_collection
 */
class FieldCollectionBasicTestCase extends WebTestBase {

  /**
   * Field collection field.
   *
   * @var
   */
  protected $field;

  /**
   * Field collection field instance.
   *
   * @var
   */
  protected $instance;

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = array('field_collection', 'node',
                                    'field', 'field_ui');

  public static function getInfo() {
    return array(
      'name' => 'Field collection',
      'description' => 'Tests creating and using field collections.',
      'group' => 'Field types',
    );
  }

  public function setUp() {
    parent::setUp();

    // Create Article node type.
    if ($this->profile != 'standard') {
      $this->drupalCreateContentType(array('type' => 'article',
                                           'name' => 'Article'));
    }

    // Create a field_collection field to use for the tests.
    $this->field_collection_name = 'field_test_collection';

    $this->field_collection_field_storage =
      entity_create('field_storage_config', array(
        'field_name' => $this->field_collection_name,
        'entity_type' => 'node',
        'type' => 'field_collection',
        'cardinality' => 4,));

    $this->field_collection_field_storage->save();

    $this->field_collection_field =
      $this->addFieldCollectionFieldToContentType('article');

    // Create an integer field inside the field_collection.
    $this->inner_field_name = 'field_inner';

    $this->inner_field_storage = entity_create('field_storage_config', array(
      'field_name' => $this->inner_field_name,
      'entity_type' => 'field_collection_item',
      'type' => 'integer',));

    $this->inner_field_storage->save();

    $this->inner_field_definition = array(
      'field_name' => $this->inner_field_name,
      'entity_type' => 'field_collection_item',
      'bundle' => $this->field_collection_name,
      'field_storage' => $this->inner_field_storage,
      'label' => $this->randomMachineName() . '_label',
      'description' => $this->randomMachineName() . '_description',
      'settings' => array(),);

    $this->inner_field =
      entity_create('field_config', $this->inner_field_definition);

    $this->inner_field->save();

    entity_get_form_display('field_collection_item',
                            $this->field_collection_name, 'default')
      ->setComponent($this->inner_field_name, array('type' => 'number'))
      ->save();

    entity_get_display('field_collection_item',
                       $this->field_collection_name, 'default')
      ->setComponent($this->inner_field_name,
                     array('type' => 'number_decimal',))
      ->save();
  }

  /**
   * Helper function for adding the field collection field to a content type.
   */
  protected function addFieldCollectionFieldToContentType($content_type) {
    $this->field_collection_definition = array(
      'field_name' => $this->field_collection_name,
      'entity_type' => 'node',
      'bundle' => $content_type,
      'field_storage' => $this->field_collection_field_storage,
      'label' => $this->randomMachineName() . '_label',
      'description' => $this->randomMachineName() . '_description',
      'settings' => array(),
    );

    $field_config = entity_create('field_config',
                                  $this->field_collection_definition);

    $field_config->save();

    \Drupal::entityManager()
      ->getStorage('entity_view_display')
      ->load("node.$content_type.default")
      ->setComponent($this->field_collection_name, array(
        'type' => 'field_collection_editable',))
      ->save();

    return $field_config;
  }

  /**
   * Helper for creating a new node with a field collection item.
   */
  protected function createNodeWithFieldCollection($content_type) {
    $node = $this->drupalCreateNode(array('type' => $content_type));

    // Manually create a field_collection.
    $entity = entity_create('field_collection_item', array(
      'field_name' => $this->field_collection_name));

    $entity->{$this->inner_field_name}->setValue(1);
    $entity->setHostEntity($node);
    $entity->save();

    return array($node, $entity);
  }

  /**
   * Tests CRUD.
   */
  public function testCRUD() {
    list ($node, $field_collection_item) =
      $this->createNodeWithFieldCollection('article');

    $node = node_load($node->id(), TRUE);

    $this->assertEqual(
      $field_collection_item->id(),
      $node->{$this->field_collection_name}->value,
      'A field_collection_item has been successfully created and referenced.');

    $this->assertEqual(
      $field_collection_item->revision_id->value,
      $node->{$this->field_collection_name}->revision_id,
      'The new field_collection_item has the correct revision.');

    // Test adding an additional field_collection_item.
    $field_collection_item_2 = entity_create(
      'field_collection_item',
      array('field_name' => $this->field_collection_name));

    $field_collection_item_2->{$this->inner_field_name}->setValue(2);

    $node->{$this->field_collection_name}[1] =
      array('field_collection_item' => $field_collection_item_2);

    $node->save();
    $node = node_load($node->id(), TRUE);

    $this->assertTrue(
      !empty($field_collection_item_2->id()) &&
      !empty($field_collection_item_2->getRevisionId()),
      'Another field_collection_item has been saved.');

    $this->assertTrue(
      count(entity_load_multiple('field_collection_item', NULL, TRUE)) == 2,
      'field_collection_items have been stored.');

    $this->assertEqual($field_collection_item->id(),
                       $node->{$this->field_collection_name}->value,
                       'Existing reference has been kept during update.');

    $this->assertEqual(
      $field_collection_item->getRevisionId(),
      $node->{$this->field_collection_name}[0]->revision_id,
      'Revision: Existing reference has been kept during update.');

    $this->assertEqual(
      $field_collection_item_2->id(),
      $node->{$this->field_collection_name}[1]->value,
      'New field_collection_item has been properly referenced.');

    $this->assertEqual(
      $field_collection_item_2->getRevisionId(),
      $node->{$this->field_collection_name}[1]->revision_id,
      'Revision: New field_collection_item has been properly referenced.');

    // Make sure deleting the field collection item removes the reference.
    $field_collection_item_2->delete();
    $node = node_load($node->id(), TRUE);

    $this->assertTrue(!isset($node->{$this->field_collection_name}[1]),
                      'Reference correctly deleted.');

    // Make sure field_collections are removed during deletion of the host.
    $node->delete();

    $this->assertTrue(
      entity_load_multiple('field_collection_item', NULL, TRUE) === array(),
      'field_collection_item deleted when the host is deleted.');

    // Try deleting nodes with collections without any values.
    $node = $this->drupalCreateNode(array('type' => 'article'));
    $node->delete();

    $this->assertTrue(node_load($node->id(), NULL, TRUE) == FALSE,
                      'Node without collection values deleted.');

    // Test creating a field collection entity with a not-yet saved host entity.
    $node = $this->drupalCreateNode(array('type' => 'article'));

    $field_collection_item = entity_create(
      'field_collection_item',
      array('field_name' => $this->field_collection_name));

    $field_collection_item->{$this->inner_field_name}->setValue(3);
    $field_collection_item->setHostEntity($node);
    $field_collection_item->save();

    // Now the node should have been saved with the collection and the link
    // should have been established.
    $this->assertTrue(!empty($node->id()),
                      'Node has been saved with the collection.');

    $this->assertTrue(
      count($node->{$this->field_collection_name}) == 1 &&
      !empty($node->{$this->field_collection_name}[0]->value) &&
      !empty($node->{$this->field_collection_name}[0]->revision_id),
      'Link has been established.');

    // Again, test creating a field collection with a not-yet saved host entity,
    // but this time save both entities via the host.
    $node = $this->drupalCreateNode(array('type' => 'article'));

    $field_collection_item = entity_create(
      'field_collection_item',
      array('field_name' => $this->field_collection_name));

    $field_collection_item->{$this->inner_field_name}->setValue(4);
    $field_collection_item->setHostEntity($node);
    $node->save();

    $this->assertTrue(!empty($field_collection_item->id()) &&
                      !empty($field_collection_item->getRevisionId()),
                      'Collection has been saved with the host.');

    $this->assertTrue(
      count($node->{$this->field_collection_name}) == 1 &&
      !empty($node->{$this->field_collection_name}[0]->value) &&
      !empty($node->{$this->field_collection_name}[0]->revision_id),
      'Link has been established.');

    /*
    // Test Revisions.
    list ($node, $item) = $this->createNodeWithFieldCollection();

    // Test saving a new revision of a node.
    $node->revision = TRUE;
    node_save($node);
    $item_updated = field_collection_item_load($node->{$this->field_collection_name}[LANGUAGE_NONE][0]['value']);
    $this->assertNotEqual($item->revision_id, $item_updated->revision_id, 'Creating a new host entity revision creates a new field collection revision.');

    // Test saving the node without creating a new revision.
    $item = $item_updated;
    $node->revision = FALSE;
    node_save($node);
    $item_updated = field_collection_item_load($node->{$this->field_collection_name}[LANGUAGE_NONE][0]['value']);
    $this->assertEqual($item->revision_id, $item_updated->revision_id, 'Updating a new host entity  without creating a new revision does not create a new field collection revision.');

    // Create a new revision of the node, such we have a non default node and
    // field collection revision. Then test using it.
    $vid = $node->vid;
    $item_revision_id = $item_updated->revision_id;
    $node->revision = TRUE;
    node_save($node);

    $item_updated = field_collection_item_load($node->{$this->field_collection_name}[LANGUAGE_NONE][0]['value']);
    $this->assertNotEqual($item_revision_id, $item_updated->revision_id, 'Creating a new host entity revision creates a new field collection revision.');
    $this->assertTrue($item_updated->isDefaultRevision(), 'Field collection of default host entity revision is default too.');
    $this->assertEqual($item_updated->hostEntityId(), $node->nid, 'Can access host entity ID of default field collection revision.');
    $this->assertEqual($item_updated->hostEntity()->vid, $node->vid, 'Loaded default host entity revision.');

    $item = entity_revision_load('field_collection_item', $item_revision_id);
    $this->assertFalse($item->isDefaultRevision(), 'Field collection of non-default host entity is non-default too.');
    $this->assertEqual($item->hostEntityId(), $node->nid, 'Can access host entity ID of non-default field collection revision.');
    $this->assertEqual($item->hostEntity()->vid, $vid, 'Loaded non-default host entity revision.');

    // Delete the non-default revision and make sure the field collection item
    // revision has been deleted too.
    entity_revision_delete('node', $vid);
    $this->assertFalse(entity_revision_load('node', $vid), 'Host entity revision deleted.');
    $this->assertFalse(entity_revision_load('field_collection_item', $item_revision_id), 'Field collection item revision deleted.');

    // Test having archived field collections, i.e. collections referenced only
    // in non-default revisions.
    list ($node, $item) = $this->createNodeWithFieldCollection();
    // Create two revisions.
    $node_vid = $node->vid;
    $node->revision = TRUE;
    node_save($node);

    $node_vid2 = $node->vid;
    $node->revision = TRUE;
    node_save($node);

    // Now delete the field collection item for the default revision.
    $item = field_collection_item_load($node->{$this->field_collection_name}[LANGUAGE_NONE][0]['value']);
    $item_revision_id = $item->revision_id;
    $item->deleteRevision();
    $node = node_load($node->nid);
    $this->assertTrue(!isset($node->{$this->field_collection_name}[LANGUAGE_NONE][0]), 'Field collection item revision removed from host.');
    $this->assertFalse(field_collection_item_revision_load($item->revision_id), 'Field collection item default revision deleted.');

    $item = field_collection_item_load($item->item_id);
    $this->assertNotEqual($item->revision_id, $item_revision_id, 'Field collection default revision has been updated.');
    $this->assertTrue($item->archived, 'Field collection item has been archived.');
    $this->assertFalse($item->isInUse(), 'Field collection item specified as not in use.');
    $this->assertTrue($item->isDefaultRevision(), 'Field collection of non-default host entity is default (but archived).');
    $this->assertEqual($item->hostEntityId(), $node->nid, 'Can access host entity ID of non-default field collection revision.');
    $this->assertEqual($item->hostEntity()->nid, $node->nid, 'Loaded non-default host entity revision.');

    // Test deleting a revision of an archived field collection.
    $node_revision2 = node_load($node->nid, $node_vid2);
    $item = field_collection_item_revision_load($node_revision2->{$this->field_collection_name}[LANGUAGE_NONE][0]['revision_id']);
    $item->deleteRevision();
    // There should be one revision left, so the item should still exist.
    $item = field_collection_item_load($item->item_id);
    $this->assertTrue($item->archived, 'Field collection item is still archived.');
    $this->assertFalse($item->isInUse(), 'Field collection item specified as not in use.');

    // Test that deleting the first node revision deletes the whole field
    // collection item as it contains its last revision.
    node_revision_delete($node_vid);
    $this->assertFalse(field_collection_item_load($item->item_id), 'Archived field collection deleted when last revision deleted.');

    // Test that removing a field-collection item also deletes it.
    list ($node, $item) = $this->createNodeWithFieldCollection();

    $node->{$this->field_collection_name}[LANGUAGE_NONE] = array();
    $node->revision = FALSE;
    node_save($node);
    $this->assertFalse(field_collection_item_load($item->item_id), 'Removed field collection item has been deleted.');

    // Test removing a field-collection item while creating a new host revision.
    list ($node, $item) = $this->createNodeWithFieldCollection();
    $node->{$this->field_collection_name}[LANGUAGE_NONE] = array();
    $node->revision = TRUE;
    node_save($node);
    // Item should not be deleted but archived now.
    $item = field_collection_item_load($item->item_id);
    $this->assertTrue($item, 'Removed field collection item still exists.');
    $this->assertTrue($item->archived, 'Removed field collection item is archived.');
    */
  }

  /**
   * Test deleting the field corrosponding to a field collection.
   */
  public function testFieldDeletion() {
    // Create a separate content type with the field collection field.
    $this->drupalCreateContentType(array('type' => 'test_content_type',
                                         'name' => 'Test content type'));

    $field_collection_field_1 = $this->field_collection_field;

    $field_collection_field_2 =
      $this->addFieldCollectionFieldToContentType('test_content_type');

    list($node_1, $field_collection_item_1) =
      $this->createNodeWithFieldCollection('article');

    list($node_2, $field_collection_item_2) =
      $this->createNodeWithFieldCollection('test_content_type');

    $field_collection_item_id_1 = $field_collection_item_1->id();
    $field_collection_item_id_2 = $field_collection_item_2->id();
    $field_storage_config_id = $this->field_collection_field_storage->id();

    $field_collection_field_1->delete();

    $this->assertNull(
      entity_load('field_collection_item', $field_collection_item_id_1, TRUE),
      'field_collection_item deleted with the field_collection field.');

    $this->assertNotNull(
      entity_load('field_collection_item', $field_collection_item_id_2, TRUE),
      'Other field_collection_item still exists.');

    $this->assertNotNull(
      entity_load('field_collection', $this->field_collection_name, TRUE),
      'field_collection config entity still exists.');

    $field_collection_field_2->delete();

    $this->assertNull(
      entity_load('field_collection_item', $field_collection_item_id_2, TRUE),
      'Other field_collection_item deleted with it\'s field.');

    $this->assertNull(
      entity_load('field_collection', $this->field_collection_name, TRUE),
      'field_collection config entity deleted.');
  }

  /**
   * Make sure the basic UI and access checks are working.
   */
  public function testBasicUI() {
    $node = $this->drupalCreateNode(array('type' => 'article'));

    // Login with new user that has no privileges.
    $user = $this->drupalCreateUser(array('access content'));
    $this->drupalLogin($user);

    // Make sure access is denied.
    $path =
      "field_collection_item/add/field_test_collection/node/{$node->id()}";

    $this->drupalGet($path);
    $this->assertText(t('Access denied'), 'Access has been denied.');

    // Login with new user that has basic edit rights.
    $user_privileged = $this->drupalCreateUser(array(
      'access content',
      'edit any article content'));

    $this->drupalLogin($user_privileged);

    // Test field collection item add form.
    $this->drupalGet('admin/structure/types/manage/article/display');
    $this->drupalGet("node/{$node->id()}");
    $this->assertLinkByHref($path, 0, 'Add link is shown.');
    $this->drupalGet($path);

    $this->assertText(t($this->inner_field_definition['label']),
                      'Add form is shown.');

    $edit = array("$this->inner_field_name[0][value]" => rand());
    $this->drupalPostForm(NULL, $edit, t('Save'));

    $this->assertText(t('Successfully added a @field.',
                        array('@field' => $this->field_collection_name)),
                      'Field collection saved.');

    $this->assertText($edit["$this->inner_field_name[0][value]"],
                      'Added field value is shown.');

    $field_collection_item = field_collection_item_load(1);

    // Test field collection item edit form.
    $edit["$this->inner_field_name[0][value]"] = rand();
    $this->drupalPostForm('field_collection_item/1/edit', $edit, t('Save'));

    $this->assertText(t('Successfully edited @field.',
                        array('@field' => $field_collection_item->label())),
                      'Field collection saved.');

    $this->assertText($edit["$this->inner_field_name[0][value]"],
                      'Field collection has been edited.');

    $this->drupalGet('field_collection_item/1');

    $this->assertText($edit["$this->inner_field_name[0][value]"],
                      'Field collection can be viewed.');

    /*
    // Add further 3 items, so we have reached 4 == maxium cardinality.
    $this->drupalPostForm('field_collection_item/1/edit', $edit, t('Save'));
    $this->drupalPostForm('field_collection_item/1/edit', $edit, t('Save'));
    $this->drupalPostForm('field_collection_item/1/edit', $edit, t('Save'));

    // Make sure adding doesn't work any more as we have restricted cardinality
    // to 1.
    $this->drupalGet($path);
    $this->assertText(t('Too many items.'),
                      'Maxium cardinality has been reached.');

    $this->drupalPost('field-collection/field-test-collection/1/delete', array(), t('Delete'));
    $this->drupalGet($path);
    // Add form is shown again.
    $this->assertText(t('Test text field'), 'Field collection item has been deleted.');

    // Test the viewing a revision. There should be no links to change it.
    $vid = $node->vid;
    $node = node_load($node->nid, NULL, TRUE);
    $node->revision = TRUE;
    node_save($node);

    $this->drupalGet("node/$node->nid/revisions/$vid/view");
    $this->assertResponse(403, 'Access to view revision denied');
    // Login in as admin and try again.
    $user = $this->drupalCreateUser(array('administer nodes', 'bypass node access'));
    $this->drupalLogin($user);
    $this->drupalGet("node/$node->nid/revisions/$vid/view");
    $this->assertNoResponse(403, 'Access to view revision granted');

    $this->assertNoLinkByHref($path, 'No links on revision view.');
    $this->assertNoLinkByHref('field-collection/field-test-collection/2/edit', 'No links on revision view.');
    $this->assertNoLinkByHref('field-collection/field-test-collection/2/delete', 'No links on revision view.');

    $this->drupalGet("node/$node->nid/revisions");
  */
  }

}
