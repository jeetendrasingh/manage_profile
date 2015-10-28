<?php

/**
 * @file
 * Provides the field collection item view / edit / delete pages.
 */

// TODO: fix being embedded in a host with revisions.

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Field collection item view page.
 */
function field_collection_item_page_view($field_collection_item) {
  // @todo: Set breadcrumb including the host.
  drupal_set_title($field_collection_item->label());
  return entity_view($field_collection_item, 'full');
}

/**
 * Form for editing a field collection item.
 * @todo implement hook_forms().
 */
function field_collection_item_form($form, &$form_state, $field_collection_item) {
  if (!isset($field_collection_item->is_new)) {
    drupal_set_title($field_collection_item->label());
  }
  return entity_get_form($field_collection_item);
}

/**
 * Form for deleting a field collection item.
 */
function field_collection_item_delete_confirm($form, &$form_state, $field_collection_item) {
  $form_state += array('field_collection_item' => $field_collection_item);
  return confirm_form($form,
    t('Are you sure you want to delete %label?', array('%label' => $field_collection_item->label())),
    $field_collection_item->path(),
    t('This action cannot be undone.'),
    t('Delete'),
    t('Cancel')
  );
}

/**
 * Submit callback for deleting a field collection item.
 */
function field_collection_item_delete_confirm_submit($form, &$form_state) {
  $field_collection_item = $form_state['field_collection_item'];
  $field_collection_item->deleteRevision();
  drupal_set_message(t('%label has been deleted.', array('%label' => drupal_ucfirst($field_collection_item->label()))));
  $form_state['redirect'] = '<front>';
}

/**
 * Add a new field collection item.
 *
 * @todo: Support optionally passing in the revision_id and langcode parameters.
 */
function field_collection_item_add($field_name, $entity_type, $entity_id, $revision_id = NULL) {
  // This entity type exists.
  if (($info = entity_get_info($entity_type)) &&
    // The host entity exists.
    ($entity = entity_load($entity_type, $entity_id)) &&
    // The field exists on the given entity type and bundle.
    ($instance = field_info_instance($entity_type, $field_name, $result->bundle())) &&
    // Adding another value will not violate the field cardinality.
    ($field['cardinality'] == FIELD_CARDINALITY_UNLIMITED || empty($entity->{$field_name}) || count($entity->{$field_name}) < $field['cardinality'])) {
    // Create a new field collection item.
    $field_collection_item = entity_create('field_collection_item', array('field_name' => $field_name));

    // Check access.
    if (!$field_collection_item->access('create')) {
      return new AccessDeniedHttpException();
    }

    // @todo add this to FieldCollectionItemInterface.
    // Do not link the field collection item with the host entity at this point,
    // as during the form-workflow we have multiple field collection item entity
    // instances, which we don't want link all with the host.
    // That way the link is going to be created when the item is saved.
    $field_collection_item->setHostEntity($entity_type, $entity, $entity->langcode, FALSE);

    // @todo add this to FieldCollectionItemInterface.
    $title = ($field['cardinality'] == 1) ? $instance['label'] : t('Add new !instance_label', array('!instance_label' => $field_collection_item->translatedInstanceLabel()));
    drupal_set_title($title);

    return entity_get_form($field_collection_item);
  }
  // Either no such entity type, no such entity, no such field instance or too
  // many instances.
  return new NotFoundHttpException();
}
