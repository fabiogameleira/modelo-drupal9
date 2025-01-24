<?php

namespace Drupal\a11y_form_helpers\Plugin;

use Drupal\Core\Form\FormStateInterface;

/**
 * Interface Autocomplete Attribute Plugin Base.
 */
interface AutocompleteAttributePluginBaseInterface {

  /**
   * Alter the field widget form for adding autocomplete attributes.
   *
   * @param array $element
   *   The element to alter.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state object.
   * @param array $context
   *   The context of the field widget.
   *
   * @return array
   *   The renderable element.
   */
  public function fieldWidgetFormAlter(array &$element, FormStateInterface $form_state, array $context);

}
