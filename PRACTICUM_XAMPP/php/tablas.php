<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programas</title>
    <style>
        /* Estilos CSS para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {background-color: #f5f5f5;}
    </style>
</head>
<body>

    <h1>Lista de Programas</h1>

    <?php
    // Parámetros de conexión a la base de datos
    $host = "localhost";        // El host de la base de datos (normalmente 'localhost')
    $usuario = "root";          // Tu nombre de usuario (por ejemplo, 'root')
    $password = "";             // Tu contraseña (si no tienes, déjalo vacío)
    $base_datos = "r_anahuac"; // El nombre de tu base de datos

    // Crear la conexión
    $conn = new mysqli($host, $usuario, $password, $base_datos);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener los datos de la tabla 'programa'
    $sql = "SELECT * FROM programa";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Crear una tabla HTML para mostrar los datos
        echo "<table>";
        echo "<tr>
                <th>ID Programa</th>
                <th>Nombre</th>
                <th>Día</th>
                <th>Hora</th>
                <th>Locutores</th>
                <th>Descripción</th>
                <th>Links</th>
              </tr>";
        
        // Recorrer los resultados y mostrarlos en la tabla
        while($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>" . $fila['ID_PROGRAMA'] . "</td>
                    <td>" . $fila['NOMBRE'] . "</td>
                    <td>" . $fila['DIA'] . "</td>
                    <td>" . $fila['HORA'] . "</td>
                    <td>" . $fila['LOCUTORES'] . "</td>
                    <td>" . $fila['DESCRIPCION'] . "</td>
                    <td><a href='" . $fila['LINKS'] . "' target='_blank'>" . $fila['LINKS'] . "</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay programas disponibles.</p>";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

</body>
</html>
