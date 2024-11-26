<?php

namespace Drupal\conexion_bd\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Exception;

/**
 * Controlador para verificar la conexión a la base de datos.
 */
class ConexionController extends ControllerBase {

  /**
   * Verifica la conexión a la base de datos.
   */
  public function verificarConexion() {
    try {
      // Intenta conectarte a la base de datos.
      $connection = Database::getConnection();
      $connection->query('SELECT 1')->fetchField();

      // Si la conexión es exitosa.
      $mensaje = 'La conexión a la base de datos fue exitosa.';
    }
    catch (Exception $e) {
      // Si ocurre un error en la conexión.
      $mensaje = 'Error al conectarse a la base de datos: ' . 
$e->getMessage();
    }

    // Retorna el mensaje como una página.
    return [
      '#type' => 'markup',
      '#markup' => '<p>' . $mensaje . '</p>',
    ];
  }
}

