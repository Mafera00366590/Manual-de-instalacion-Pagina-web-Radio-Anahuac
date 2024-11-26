<?php

namespace Drupal\ivoox_test\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Clase IvooxTestController.
 *
 * Esta clase maneja la lógica para renderizar el contenido de la página 
con el enlace de Ivoox.
 */
class IvooxTestController extends ControllerBase {

  /**
   * Construye el contenido de la página.
   *
   * @return array
   *   Un arreglo renderizable con el contenido que se mostrará en la 
página.
   */
  public function ivooxTestPage() {
    // Enlace de Ivoox que se va a imprimir.
    $ivoox_link = 
'https://www.ivoox.com/player_es_podcast_2390082_zp_1.html';
    
    // Se devuelve el enlace como un hipervínculo en HTML.
    return [
      '#markup' => t('Puedes escuchar el podcast aquí: <a href="@link" 
target="_blank">@link</a>', ['@link' => $ivoox_link]),
    ];
  }
}

