<?php

/**
 * @file
 * Contains \Drupal\field_collection\Tests\FieldCollectionRulesIntegrationTest.
 */

namespace Drupal\field_collection\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Test case for rules integration.
 *
 * @group field_collection
 */
class FieldCollectionRulesIntegrationTest extends WebTestBase {

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
   * Field collection field id.
   *
   * @var
   */
  protected $fieldId;

  /**
   * Field collection field name.
   *
   * @var
   */
  protected $fieldName;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('field_collection', 'rules');

  public static function getInfo() {
    return array(
      'name' => 'Field collection Rules integration',
      'description' => 'Tests using field collections with rules.',
      'group' => 'Field types',
      'dependencies' => array('rules'),
    );
  }

  public function setUp() {
    parent::setUp();
    variable_set('rules_debug_log', 1);
  }

  /**
   * Utility method to create field_instance fields.
   *
   * @param int $cardinality
   *   Cardinality of field to create.
   */
  protected function createFields($cardinality = 4) {
    // Create a field_collection field to use for the tests.
    $this->fieldName = 'field_test_collection';
    $this->field = array(
      'field_name' => $this->fieldName,
      'type' => 'field_collection',
      'cardinality' => $cardinality
    );
    $this->field = field_create_field($this->field);
    $this->fieldId = $this->field['id'];

    $this->instance = array(
      'field_name' => $this->fieldName,
      'entity_type' => 'node',
      'bundle' => 'article',
      'label' => $this->randomName() . '_label',
      'description' => $this->randomName() . '_description',
      'weight' => mt_rand(0, 127),
      'settings' => array(),
      'widget' => array(
        'type' => 'hidden',
        'label' => 'Test',
        'settings' => array(),
      ),
    );
    $this->instance = field_create_instance($this->instance);
    // Add a field to the collection.
    $field = array(
      'field_name' => 'field_text',
      'type' => 'text',
      'cardinality' => 1,
      'translatable' => FALSE,
    );
    field_create_field($field);
    $instance = array(
      'entity_type' => 'field_collection_item',
      'field_name' => 'field_text',
      'bundle' => $this->fieldName,
      'label' => 'Test text field',
      'widget' => array(
        'type' => 'text_textfield',
      ),
    );
    field_create_instance($instance);
  }

  /**
   * Test creation field collection items.
   */
  public function testCreation() {
    $this->createFields();

    $node = $this->drupalCreateNode(array('type' => 'article'));
    // Create a field collection.
    $action_set = rules_action_set(array('node' => array('type' => 'node', 'bundle' => 'article')));
    $action_set->action('entity_create', array(
      'type' => 'field_collection_item',
      'param_field_name' => $this->fieldName,
      'param_host_entity:select' => 'node',
    ));
    $action_set->action('data_set', array('data:select' => 'entity-created:field-text', 'value' => 'foo'));
    $action_set->execute($node);

    $node = node_load($node->nid, NULL, TRUE);
    $this->assertTrue(!empty($node->{$this->fieldName}[LANGUAGE_NONE][0]['value']), 'A field_collection has been successfully created.');
    $this->assertTrue(!empty($node->{$this->fieldName}[LANGUAGE_NONE][0]['revision_id']), 'A field_collection has been successfully created (revision).');

    // Now try making use of the field collection in rules.
    $action_set = rules_action_set(array('node' => array('type' => 'node', 'bundle' => 'article')));
    $action_set->action('drupal_message', array('message:select' => 'node:field-test-collection:0:field-text'));
    $action_set->execute($node);

    $msg = drupal_get_messages();
    $this->assertEqual(array_pop($msg['status']), 'foo', 'Field collection can be used.');
    RulesLog::logger()->checkLog();
  }

  /**
   * Test using field collection items via the host while they are being created.
   */
  public function testUsageDuringCreation() {
    // Test using a single-cardinality field collection.
    $this->createFields(1);

    $node = $this->drupalCreateNode(array('type' => 'article'));
    $entity = entity_create('field_collection_item', array('field_name' => $this->fieldName));
    $entity->setHostEntity('node', $node);
    // Now the field collection is linked to the host, but not yet saved.

    // Test using the wrapper on it.
    $wrapper = entity_metadata_wrapper('node', $node);
    $wrapper->get($this->fieldName)->field_text->set('foo');
    $this->assertEqual($entity->field_text[LANGUAGE_NONE][0]['value'], 'foo', 'Field collection item used during creation via the wrapper.');

    // Now test it via Rules, which should save our changes.
    $set = rules_action_set(array('node' => array('type' => 'node', 'bundle' => 'article')));
    $set->action('data_set', array('data:select' => 'node:' . $this->fieldName . ':field-text', 'value' => 'bar'));
    $set->execute($node);
    $this->assertEqual($entity->field_text[LANGUAGE_NONE][0]['value'], 'bar', 'Field collection item used during creation via Rules.');
    $this->assertTrue(!empty($entity->item_id) && !empty($entity->revision_id), 'Field collection item has been saved by Rules and the host entity.');
    RulesLog::logger()->checkLog();
  }
}
