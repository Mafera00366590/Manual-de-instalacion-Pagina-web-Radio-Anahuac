<?php

namespace Drupal\parrilla_modulo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controlador para mostrar la parrilla de programación.
 */
class ParrillaController extends ControllerBase {

  /**
   * Muestra la parrilla de programación con horarios y días de la semana.
   *
   * @return array
   *   Render array para mostrar la tabla.
   */
  public function mostrarParrilla() {
    // Conexión a la base de datos de Drupal.
    $connection = \Drupal::database();

    // Consulta SQL adaptada para obtener la programación organizada.
    $query = $connection->query("
      SELECT 
        p.nombre AS programa_nombre, 
        h.dia, 
        h.h_inicio, 
        h.h_fin, 
        pa.id_hora
      FROM 
        {parrilla} pa
      JOIN 
        {programas} p ON pa.id_programa = p.id_programa
      JOIN 
        {horario} h ON pa.id_hora = h.id_horario
      ORDER BY 
        pa.id_hora, FIELD(h.dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo')
    ");

    // Estructuras para organizar la parrilla.
    $parrilla = [];
    $horarios = [];

    foreach ($query as $fila) {
      // Formato del horario.
      $hora = "{$fila->h_inicio} - {$fila->h_fin}";
      $dia = $fila->dia;
      $programa = $fila->programa_nombre;

      // Organiza la parrilla por hora y día.
      $parrilla[$hora][$dia] = $programa;

      // Guarda los horarios únicos.
      if (!in_array($hora, $horarios)) {
        $horarios[] = $hora;
      }
    }

    // Encabezados de la tabla.
    $header = [
      $this->t('Horario'),
      $this->t('Lunes'),
      $this->t('Martes'),
      $this->t('Miércoles'),
      $this->t('Jueves'),
      $this->t('Viernes'),
      $this->t('Sábado'),
      $this->t('Domingo'),
    ];

    // Filas de la tabla.
    $rows = [];
    foreach ($horarios as $hora) {
      $row = [$hora];
      foreach (['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $dia) {
        $row[] = $parrilla[$hora][$dia] ?? '';
      }
      $rows[] = $row;
    }

    // Construcción de la tabla con render array.
    return [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#attributes' => ['class' => ['parrilla-table']],
    ];
  }

}

