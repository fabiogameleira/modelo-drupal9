<?php

namespace Drupal\a11y_form_helpers;

use Drupal\Core\Security\TrustedCallbackInterface;

/**
 * Provides functionality to pre-render elements.
 */
class A11yFormHelpersRenderElement implements TrustedCallbackInterface {

  /**
   * {@inheritdoc}
   */
  public static function trustedCallbacks() {
    return ['preRenderElement'];
  }

  /**
   * Alters the element type info.
   *
   * @param array $info
   *   An associative array with structure identical to that of the return value
   *   of \Drupal\Core\Render\ElementInfoManagerInterface::getInfo().
   */
  public function alterElementInfo(array &$info) {
    foreach ($info as $element_type => $element_info) {
      $info[$element_type]['#pre_render'][] = [static::class, 'preRenderElement'];
    }
  }

  /**
   * Pre-render all elements and prepend form error's as readable output.
   *
   * @param array $element
   *   An associative array containing the properties and children of the
   *   element.
   *
   * @return array
   *   The pre-rendered element.
   */
  public static function preRenderElement(array $element) {
    if (isset($element['#errors'])) {
      $current_descr = '';

      if (isset($element['#attributes']['aria-describedby'])) {
        $current_descr = ' ' . $element['#attributes']['aria-describedby'];
      }

      $element['#attributes']['aria-describedby'] = $element['#id'] . '--errormessage' . $current_descr;
    }

    return $element;
  }

}
