<?php

/**
 * @file
 * Contains \Drupal\field_collection\Access\FieldCollectionItemHostAddOperationCheck.
 */

namespace Drupal\field_collection\Access;

use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\field_collection\Entity\FieldCollectionItem;
use Drupal\Core\Language\LanguageInterface;

use Symfony\Component\Routing\Route;

/**
 * Determines access to operations on the field collection item's host.
 */
class FieldCollectionItemHostAddOperationCheck implements AccessInterface {

  /**
   * The entity manager.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * Constructs a FieldCollectionItemHostAddOperationCheck object.
   *
   * @param \Drupal\Core\Entity\EntityManagerInterface $entity_manager
   *   The entity manager.
   */
  public function __construct(EntityManagerInterface $entity_manager) {
    $this->entityManager = $entity_manager;
  }

  /**
   * Checks access to add a field collection item to its future host.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The currently logged in account.
   *
   * TODO: Document params
   *
   * @return string
   *   A \Drupal\Core\Access\AccessInterface constant value.
   */
  public function access(AccountInterface $account, $host_type, $host_id) {
    $access_control_handler =
      $this->entityManager->getAccessControlHandler($host_type);

    $host = $this->entityManager->getStorage($host_type)->load($host_id);

    return $access_control_handler->access(
      $host, 'update', LanguageInterface::LANGCODE_DEFAULT, NULL, TRUE);
  }

}
