<?php

namespace Drupal\a11y_form_helpers\Plugin;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\PluginBase;

/**
 * Class Autocomplete Attribute Plugin Base.
 */
abstract class AutocompleteAttributePluginBase extends PluginBase implements AutocompleteAttributePluginBaseInterface {

  /**
   * {@inheritdoc}
   */
  public function fieldWidgetFormAlter(array &$element, FormStateInterface $form_state, array $context) {
    $element['value']['#attributes']['autocomplete'] = $this->getPluginId();
  }

}
