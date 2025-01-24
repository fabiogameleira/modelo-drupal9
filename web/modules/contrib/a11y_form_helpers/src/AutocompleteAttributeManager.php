<?php

namespace Drupal\a11y_form_helpers;

use Drupal\a11y_form_helpers\Annotation\AutocompleteAttribute;
use Drupal\a11y_form_helpers\Plugin\AutocompleteAttributePluginBaseInterface;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Class AutocompleteAttributeManager.
 *
 * @package Drupal\a11y_form_helpers
 */
class AutocompleteAttributeManager extends DefaultPluginManager implements AutocompleteAttributeManagerInterface {

  /**
   * Constructs a Autcomplete Attribute Manager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cacheBackend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $moduleHandler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cacheBackend, ModuleHandlerInterface $moduleHandler) {
    parent::__construct(
      'Plugin/AutocompleteAttribute',
      $namespaces,
      $moduleHandler,
      AutocompleteAttributePluginBaseInterface::class,
      AutocompleteAttribute::class
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getPurposes($field_type = NULL) {
    $purposes = [];

    /** @var \Drupal\a11y_form_helpers\Plugin\AutocompleteAttributePluginBaseInterface $plugin */
    foreach ($this->getDefinitions() as $plugin) {
      if (!$field_type) {
        $purposes[$plugin['id']] = $plugin['label'];
        continue;
      }

      if (in_array($field_type, $plugin['field_types'])) {
        $purposes[$plugin['id']] = $plugin['label'];
      }
    }

    return $purposes;
  }

}
