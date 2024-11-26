<?php

namespace Drupal\programas_modulo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;

/**
 * Controlador para mostrar los datos de la tabla "programas".
 */
class ProgramasController extends ControllerBase {

  /**
   * Renderiza una tabla con los datos de los programas por día.
   */
  public function programasPage() {
    try {
      // Conexión a la base de datos.
      $connection = Database::getConnection();

      // Consulta para obtener todos los programas y sus horarios.
      $query = $connection->select('programas', 'p');
      $query->fields('p', ['id_programa', 'nombre', 'imagen']);
      $query->join('horario', 'h', 'p.horario = h.id_horario');
      $query->fields('h', ['dia', 'h_inicio']);
      $query->condition('p.nombre', 'Musica', '!='); // Excluir programas con el nombre 'Musica'.
      $query->orderBy('h.dia'); // Ordenar por día.
      $query->orderBy('h.h_inicio'); // Ordenar por hora de inicio.

      // Ejecutar la consulta y obtener los resultados.
      $results = $query->execute();
      $rows = $results->fetchAll();

      // Agrupar programas por día.
      $programas_por_dia = [
        'Lunes' => [],
        'Martes' => [],
        'Miércoles' => [],
        'Jueves' => [],
        'Viernes' => [],
      ];

      foreach ($rows as $row) {
        $programas_por_dia[$row->dia][] = $row;
      }

      // Crear el encabezado de la tabla.
      $header = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];

      // Construir las filas de la tabla.
      $table_rows = [];
      $max_programas = max(array_map('count', $programas_por_dia)); // Número máximo de programas en un día.

      for ($i = 0; $i < $max_programas; $i++) {
        $table_row = [];
        foreach ($programas_por_dia as $dia => $programas) {
          if (isset($programas[$i])) {
            $programa = $programas[$i];
            $image_path = '/drupal/sites/default/files/fotos_programas/' . 
htmlspecialchars($programa->imagen);

            // Crear contenido de la celda con enlace a la página de detalles.
            $table_row[] = [
              'data' => [
                '#markup' => '<div style="text-align:center;">
                                <a href="' . 
\Drupal\Core\Url::fromRoute('programas_modulo.detalle_programa_page', 
                                ['id_programa' => 
$programa->id_programa])->toString() . '">
                                  <img src="' . 
htmlspecialchars($image_path) . '" alt="' . 
htmlspecialchars($programa->nombre) . '" style="width:75px;height:50px;">
                                  <br>
                                  <span>' . 
htmlspecialchars($programa->nombre) . '</span>
                                </a>
                              </div>',
              ],
              'width' => '20%', // Establecer ancho fijo para columnas.
            ];
          } else {
            // Celda vacía si no hay programa.
            $table_row[] = [
              'data' => '',
              'width' => '20%', // Ancho fijo.
            ];
          }
        }
        $table_rows[] = $table_row;
      }

      // Devolver la tabla renderizada.
      return [
        '#type' => 'table',
        '#header' => $header,
        '#rows' => $table_rows,
        '#empty' => $this->t('No se encontraron programas.'),
      ];
    } catch (\Exception $e) {
      // Registrar el error en los logs.
      \Drupal::logger('programas_modulo')->error('Error en programasPage: 
' . $e->getMessage());
      return [
        '#markup' => $this->t('Ocurrió un error al cargar los programas. 
Inténtalo de nuevo más tarde.'),
      ];
    }
  }

  /**
   * Muestra los detalles de un programa.
   */
  public function detalleProgramaPage($id_programa) {
    try {
      // Conexión a la base de datos.
      $connection = Database::getConnection();

      // Consulta para obtener los detalles del programa.
      $query = $connection->select('programas', 'p')
        ->fields('p', ['id_programa', 'nombre', 'descripcion', 'imagen', 
'links']);
      $query->condition('p.id_programa', $id_programa);
      $query->join('horario', 'h', 'p.horario = h.id_horario');
      $query->fields('h', ['dia', 'h_inicio', 'h_fin']);
      $query->join('locutores', 'l', 'p.id_programa = l.id_programa');
      $query->fields('l', ['nombre_locutor']);
      $query->groupBy('p.id_programa', 'p.nombre', 'p.descripcion', 
'p.imagen', 'p.links', 'h.dia', 'h.h_inicio', 'h.h_fin');
      
      // Ejecutar la consulta y obtener los resultados.
      $results = $query->execute();
      $programa = $results->fetchObject();

      if ($programa) {
        // Mostrar los detalles del programa
        $programa_detalles = [
          '#markup' => '<h1>' . htmlspecialchars($programa->nombre) . 
'</h1>' .
                       '<img 
src="/drupal/sites/default/files/fotos_programas/' . 
htmlspecialchars($programa->imagen) . '" alt="' . 
htmlspecialchars($programa->nombre) . '" style="width:15px; 
height:10px;">' . // Imagen más pequeña
                       '<p><strong>Descripción:</strong> ' . 
htmlspecialchars($programa->descripcion) . '</p>' .
                       '<p><strong>Locutores:</strong> ' . 
htmlspecialchars($programa->nombre_locutor) . '</p>' .
                       '<p><strong>Día:</strong> ' . 
htmlspecialchars($programa->dia) . '</p>' .
                       '<p><strong>Hora:</strong> ' . 
htmlspecialchars($programa->h_inicio) . ' - ' . 
htmlspecialchars($programa->h_fin) . '</p>',
        ];

        // Asegurarse de que el enlace a Ivoox se muestre correctamente como un enlace normal.
        if (!empty($programa->links)) {
          $programa_detalles['#markup'] .= '<p><strong>Escúchalo en 
Ivoox:</strong> ' .
                                          '<a href="' . 
htmlspecialchars($programa->links) . '" target="_blank">Haz clic aquí para 
escuchar</a></p>';
        }

        return $programa_detalles;
      } else {
        return [
          '#markup' => $this->t('No se encontró el programa.'),
        ];
      }
    } catch (\Exception $e) {
      // Registrar el error en los logs.
      \Drupal::logger('programas_modulo')->error('Error en 
detalleProgramaPage: ' . $e->getMessage());
      return [
        '#markup' => $this->t('Ocurrió un error al cargar los detalles del 
programa.'),
      ];
    }
  }
}

