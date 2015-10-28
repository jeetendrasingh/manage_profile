<?php

/**
 * @file
 * Contains \Drupal\field_collection\FieldCollectionItemFormController.
 */

namespace Drupal\field_collection;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Entity\EntityInterface;
use Drupal\field_collection\Entity\FieldCollectionItem;
use Drupal\Core\Form\FormStateInterface;

class FieldCollectionItemForm extends ContentEntityForm {

  /**
   * Overrides \Drupal\Core\Entity\EntityForm::form().
   */
  public function form(array $form, FormStateInterface $form_state) {
    $field_collection_item = $this->entity;

    if ($this->operation == 'edit') {
      $form['#title'] = $this->t(
        '<em>Edit @type</em>',
        array('@type' => $field_collection_item->label()));
    }

    /*
    // Basic item information.
    foreach (array('revision_id', 'id', 'field_name') as $key) {
      $form[$key] = array(
        '#type' => 'value',
        '#value' => $field_collection_item->$key->value,
      );
    }

    $language_configuration = module_invoke('language', 'get_default_configuration', 'field_collection_item', $field_collection_item->field_name->value);

    // Set the correct default language.
    if ($field_collection_item->isNew() && !empty($language_configuration['langcode'])) {
      $language_default = language($language_configuration['langcode']);
      $field_collection_item->langcode->value = $language_default->langcode;
    }

    $form['langcode'] = array(
      '#title' => t('Language'),
      '#type' => 'language_select',
      '#default_value' => $field_collection_item->langcode->value,
      '#languages' => LANGUAGE_ALL,
      '#access' => isset($language_configuration['language_show']) && $language_configuration['language_show'],
    );
    */

    return parent::form($form, $form_state);
  }

  /**
   * Overrides \Drupal\Core\Entity\EntityFormController::submit().
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Build the block object from the submitted values.
    parent::submitForm($form, $form_state);
    $field_collection_item = $this->entity;

    // TODO: Create new revision every edit?  Might be better to make it an
    // option.  In either case, it doesn't work as is.  The default
    // revision of the host isn't getting updated to point to the new
    // field collection item revision.
    // $field_collection_item->setNewRevision();

    if (\Drupal::routeMatch()->getRouteName() ==
        'field_collection_item.add_page')
    {
      $host = entity_load(\Drupal::routeMatch()->getParameter('host_type'),
                          \Drupal::routeMatch()->getParameter('host_id'));
    }
    else {
      $host = $field_collection_item->getHost();
    }

    $form_state->setRedirect($host->urlInfo()->getRouteName(),
                             $host->urlInfo()->getRouteParameters());
  }

  /**
   * Overrides \Drupal\Core\Entity\EntityFormController::save().
   */
  public function save(array $form, FormStateInterface $form_state) {
    $field_collection_item = $this->getEntity($form_state);

    if ($field_collection_item->isNew()) {
      $host = entity_load($this->getRequest()->get('host_type'),
                          $this->getRequest()->get('host_id'));

      $field_collection_item->setHostEntity($host);
      $field_collection_item->save();
      $host->save();

      $messages = drupal_get_messages(NULL, false);
      if (!isset($messages['warning']) && !isset($messages['error'])) {
        drupal_set_message(t(
          'Successfully added a @type.',
          array('@type' => $field_collection_item->bundle())));
      }
    }
    else {
      $messages = drupal_get_messages(NULL, false);
      if (!isset($messages['warning']) && !isset($messages['error'])) {
        $field_collection_item->save();
        drupal_set_message(t(
          'Successfully edited %label.',
          array('%label' => $field_collection_item->label())));
      }
    }

    if ($field_collection_item->id()) {
      $form_state->setValue('id', $field_collection_item->id());
      $form_state->set('id', $field_collection_item->id());
    }
    else {
      // In the unlikely case something went wrong on save, the block will be
      // rebuilt and block form redisplayed.
      drupal_set_message(t(
        'The field collection item could not be saved.'), 'error');

      $form_state->setRebuild();
    }

    /*
    $form_state->setRedirect(
      'field_collection_item.view',
      array('field_collection_item' => $field_collection_item->id()
    ));
    */
  }

  /**
   * Overrides \Drupal\Core\Entity\EntityFormController::delete().
   *
   * TODO: Is this even called?  I don't think form_state can be used like that.
   */
  public function delete(array $form, FormStateInterface $form_state) {
    $destination = array();
    if (isset($_GET['destination'])) {
      $destination = drupal_get_destination();
      unset($_GET['destination']);
    }
    $field_collection_item = $this->buildEntity($form, $form_state);
    $form_state['redirect'] = array(
      'field-collection/' . $field_collection_item->id() . '/delete',
      array('query' => $destination)
    );
  }

}
