<?php

namespace Drupal\ver_tablas\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

/**
 * Controlador para mostrar los datos de la tabla "horario".
 */
class VerTablasController extends ControllerBase {

  /**
   * Muestra los datos de la tabla "horario".
   */
  public function mostrarDatos() {
    // Obtiene la conexión a la base de datos.
    $connection = Database::getConnection();
    $query = $connection->select('parrilla', 'pa')
      ->fields('pa', ['id_parrilla', 'id_programa','id_hora'])
      ->execute();

    $resultados = $query->fetchAll();

    // Construye una tabla para mostrar los datos.
    $header = [
      'ID parrilla',
      'id_programa',
      'id_hora',
    ];
    $rows = [];

    foreach ($resultados as $fila) {
      $rows[] = [
        $fila->id_hora,
        $fila->id_programa,
        $fila->id_hora,
      ];
    }

    return [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#empty' => $this->t('No se encontraron datos en la tabla.'),
    ];
  }
}

