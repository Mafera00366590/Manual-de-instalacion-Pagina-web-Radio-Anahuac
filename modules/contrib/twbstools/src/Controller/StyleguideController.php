<?php

namespace Drupal\twbstools\Controller;

use Drupal\Component\Utility\Html;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Markup;
use Drupal\Core\StreamWrapper\PublicStream;

/**
 * StyleguideController controller.
 */
class StyleguideController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function render() {
    $styleguide = file_get_contents(\Drupal::service('extension.list.module')->getPath('twbstools') . '/resources/cheatsheet/index.html');
    $styleguide = str_replace('https://getbootstrap.com/docs/5.1/examples/cheatsheet/', '', $styleguide);
    $html_dom = Html::load($styleguide);
    $xpath = new \DOMXPath($html_dom);

    // Body tag.
    $dom_aside = $html_dom->getElementsByTagName('aside')->item(0);
    $dom_cheatsheet = $html_dom->getElementsByTagName('div')->item(0);
    $xpath_cheatsheet = $xpath->query("//*[contains(@class, 'bd-cheatsheet')]")->item(0);

    // Remove headers.
    /*if($header = $body_dom->getElementsByTagName('head')->item(0)) {
      $header->parentNode->removeChild($header);
    }
    if($header = $body_dom->getElementsByTagName('header')->item(0)) {
      $header->parentNode->removeChild($header);
    }*/

    //$html_styleguide = $body_dom->ownerDocument->saveXML($body_dom);
    $html_aside = $dom_aside->ownerDocument->saveXML($dom_aside);
    $html_cheatsheet = $xpath_cheatsheet->ownerDocument->saveXML($xpath_cheatsheet);

    return [
      '#markup' => Markup::create($html_aside . $html_cheatsheet),
      '#attached' => [
        'library' => [
          'twbstools/twbstools.cheatsheet'
        ],
      ],
    ];
  }
}
