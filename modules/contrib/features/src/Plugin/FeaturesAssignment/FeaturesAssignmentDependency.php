<?php

/**
 * @file
 * Contains \Drupal\features\Plugin\FeaturesAssignment\FeaturesAssignmentDependency.
 */

namespace Drupal\features\Plugin\FeaturesAssignment;

use Drupal\features\FeaturesAssignmentMethodBase;

/**
 * Class for assigning configuration to packages based on configuration
 * dependencies.
 *
 * @Plugin(
 *   id = \Drupal\features\Plugin\FeaturesAssignment\FeaturesAssignmentDependency::METHOD_ID,
 *   weight = 10,
 *   name = @Translation("Dependency"),
 *   description = @Translation("Add to packages configuration dependent on items already in that package."),
 * )
 */
class FeaturesAssignmentDependency extends FeaturesAssignmentMethodBase {

  /**
   * The package assignment method id.
   */
  const METHOD_ID = 'dependency';

  /**
   * {@inheritdoc}
   */
  public function assignPackages() {
    $this->featuresManager->assignConfigDependents();
  }

}
