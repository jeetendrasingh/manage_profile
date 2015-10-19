<?php

/**
 * @file
 * Contains \Drupal\features_ui\Form\AssignmentCoreForm.
 */

namespace Drupal\features_ui\Form;

use Drupal\features_ui\Form\AssignmentFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configures the selected configuration assignment method for this site.
 */
class AssignmentCoreForm extends AssignmentFormBase {

  const METHOD_ID = 'core';

  /**
   * Currently active bundle.
   *
   * @var \Drupal\features\FeaturesBundleInterface
   */
  protected $currentBundle;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'features_assignment_core_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $bundle_name = NULL) {
    $this->currentBundle = $this->assigner->loadBundle($bundle_name);
    $settings = $this->currentBundle->getAssignmentSettings(self::METHOD_ID);

    $this->setTypeSelect($form, $settings['types'], $this->t('core'));
    $this->setActions($form);

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $settings = array(
      'types' => array_filter($form_state->getValue('types')),
    );
    $this->currentBundle->setAssignmentSettings(self::METHOD_ID, $settings)->save();
    $this->setRedirect($form_state);

    drupal_set_message($this->t('Package assignment configuration saved.'));
  }

}
