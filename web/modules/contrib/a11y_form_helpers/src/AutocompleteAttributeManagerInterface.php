<?php

namespace Drupal\a11y_form_helpers;

/**
 * Interface Autocomplete Attribute Manager Interface.
 *
 * @package Drupal\a11y_form_helpers
 */
interface AutocompleteAttributeManagerInterface {

  /**
   * Get all available purposes.
   *
   * @param string $field_type
   *   The field type to filter on.
   *
   * @return array
   *   List of purposes keyed by id, with a label as value.
   */
  public function getPurposes($field_type);

}
