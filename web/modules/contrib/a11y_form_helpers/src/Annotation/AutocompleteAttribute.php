<?php

namespace Drupal\a11y_form_helpers\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a AutoCompleteAttribute plugin item annotation object.
 *
 * @see \Drupal\a11y_form_helpers\Plugin\AutocompleteAttributePluginBase
 * @see plugin_api
 *
 * @Annotation
 */
class AutocompleteAttribute extends Plugin {

  /**
   * The identifier of the autocomplete plugin and exact name of the attribute.
   *
   * @var string
   *
   * @see https://www.w3.org/TR/WCAG21/#input-purposes
   */
  public $id;

  /**
   * A human readable name for the plugin.
   *
   * @var string
   */
  public $label;

  /**
   * List of widget ids that are supported by the plugin.
   *
   * @var array
   */
  public $field_types;

}
