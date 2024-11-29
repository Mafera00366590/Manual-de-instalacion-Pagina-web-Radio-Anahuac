<?php

namespace Drupal\locutores_modulo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Url;
use Drupal\Core\Database\Database;

class LocutoresController extends ControllerBase {

  /**
   * Página de lista de locutores
   */
  public function locutoresPage() {
    // Conexión a la base de datos
    $connection = Database::getConnection();

    // Obtener todos los locutores desde la tabla 'locutores' (ajusta el nombre de la tabla y columnas si es necesario)
    $query = $connection->select('locutores', 'l')
      ->fields('l', ['id_locutor', 'nombre_locutor', 'nombre_programa']) 
// Seleccionamos las columnas necesarias
      ->execute();

    // Crear el contenido HTML de la tabla
    $content = '<h2>Locutores</h2>';
    $content .= '<table border="1" cellpadding="10" cellspacing="0" 
style="width: 100%;">';
    $content .= '<thead><tr><th>Nombre del Locutor</th><th>Programa</th></tr></thead>';
    $content .= '<tbody>';

    // Iteramos sobre los locutores obtenidos de la base de datos
    foreach ($query as $locutor) {
      $url = Url::fromRoute('locutores_modulo.info_locutor', ['id_locutor' 
=> $locutor->id_locutor])->toString();
      $content .= '<tr>';
      $content .= '<td><strong>' . $locutor->nombre_locutor . 
'</strong></td>';
      $content .= '<td>' . $locutor->nombre_programa . '</td>';
      //$content .= '<td><a href="' . $url . '" class="locutores-btn">Más información</a></td>';
      //$content .= '</tr>';
    }

    $content .= '</tbody>';
    $content .= '</table>';

    // Retornar el contenido renderizado como HTML
    return [
      '#type' => 'markup',
      '#markup' => $content,
    ];
  }

  /**
   * Página de información del locutor
   */
  public function infoLocutorPage($id_locutor) {
    // Conexión a la base de datos
    $connection = Database::getConnection();

    // Obtener la información del locutor según el id
    $query = $connection->select('locutores', 'l')
      ->fields('l', ['id_locutor', 'nombre_locutor', 'nombre_programa']) 
// Seleccionamos las columnas necesarias
      ->condition('id_locutor', $id_locutor)
      ->execute()
      ->fetchObject();

    // Verificar si el locutor existe
    if ($query) {
      $nombre_locutor = $query->nombre_locutor;
      $nombre_programa = $query->nombre_programa;
    } else {
      $nombre_locutor = 'Locutor no encontrado';
      $nombre_programa = 'No disponible';
    }

    // Devolver la información del locutor
    return [
      '#type' => 'markup',
      '#markup' => '<h2>' . $nombre_locutor . 
'</h2><p><strong>Programa:</strong> ' . $nombre_programa . '</p>',
    ];
  }
}

