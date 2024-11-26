<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Locutor</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Enlazamos el archivo CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center; /* Centra el texto en el body */
        }
        .locutor-info {
            margin: 20px auto; /* Margen para centrar el contenedor */
            width: 90%; /* Ancho del contenedor */
            max-width: 600px; /* Ancho máximo de 600px */
        }
        table {
            width: 100%; /* La tabla ocupa el 100% del contenedor */
            border-collapse: collapse; /* Eliminar el espacio entre bordes de las celdas */
            margin: 20px auto; /* Margen arriba y abajo de la tabla */
            max-width: 500px; /* Establece un ancho máximo para la tabla */
        }
        th, td {
            padding: 10px; /* Espaciado interno */
            text-align: left; /* Alinear texto a la izquierda */
            border: 1px solid #ddd; /* Bordes de las celdas */
        }
        th {
            background-color: #f2f2f2; /* Color de fondo para el encabezado */
            color: #333; /* Color del texto del encabezado */
            font-weight: bold; /* Texto en negrita */
        }
        td {
            color: #555; /* Color del texto de las celdas */
        }
        .footer-container {
            margin-top: 20px; /* Margen superior para el footer */
            text-align: center; /* Centrar el texto en el footer */
        }
    </style>
</head>
<body>

<header>
    <div class="image-container">
        <img src="../images/anahuac_logo.png" alt="Logo Anáhuac">
    </div>
    <div class="header-buttons">
        <a href="https://www.anahuac.mx/mexico/radio/play/index.html" target="_blank" class="live-button">¡Escúchanos en vivo!</a>
    </div>
</header>

<!-- Barra de navegación -->
<div class="navbar">
    <a href="../html/homepage.html" class="btn">Inicio</a>
    <a href="../html/conocenos.html" class="btn">Conócenos</a>
    <a href="programas.php" class="btn">Programas</a>
    <a href="locutores.php" class="btn active">Locutores</a>
    <a href="parilla.php" class="btn">Parrilla</a>
</div>

<div class="locutor-info">
<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "radio_anahuac";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Obtener el nombre del locutor a través de la URL
    $nombre_locutor = isset($_GET['id_locutor']) ? $_GET['id_locutor'] : '';
    
    // Obtener el id del locutor a través de la URL
$id_locutor = isset($_GET['id_locutor']) ? intval($_GET['id_locutor']) : 0;

// Consulta para obtener el nombre del locutor y los programas asociados a ese locutor
$sql = "SELECT l.nombre_locutor AS nombre_locutor, p.nombre AS nombre_programa, p.descripcion AS descripcion_programa
        FROM locutores AS l
        JOIN programas AS p ON l.id_programa = p.id_programa
        WHERE l.id_locutor = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_locutor);
$stmt->execute();
$result = $stmt->get_result();

// Mostrar información del locutor y sus programas
if ($result->num_rows > 0) {
    // Obtenemos el nombre del locutor de la primera fila
    $row = $result->fetch_assoc();
    $nombre_locutor = htmlspecialchars($row['nombre_locutor']);
    
    echo "<h2>Programas de " . $nombre_locutor . "</h2>";
    echo "<table>";
    echo "<thead>
            <tr>
                <th>Nombre del Programa</th>
                <th>Descripción</th>
            </tr>
          </thead>
          <tbody>";
    do {
        $programa_nombre = htmlspecialchars($row['nombre_programa']);
        $programa_descripcion = htmlspecialchars($row['descripcion_programa']);

        // Enlace a la página de información del programa
        echo "<tr>
                <td>" . $programa_nombre . "</td>
                <td>" . $programa_descripcion . "</td>
              </tr>";
    } while ($row = $result->fetch_assoc());
    echo "</tbody></table>";
} else {
    echo "<p>No hay programas registrados para este locutor.</p>";
}

// Cerrar conexión
$stmt->close();
$conn->close();

    ?>
    
</div>

<!-- Footer -->
<footer class="footer-container">
    <div class="footer-section">
        <img src="../images/logo-RIU_0.png" alt="RIU" class="footer-logo">
    </div>

    <div class="footer-section">
        <h5>CAMPUS NORTE</h5>
        <p>Av. Universidad Anáhuac 46, Col. Lomas Anáhuac
            Huixquilucan, Estado de México, C.P. 52786</p>
        <p>Conmutador: +52 (55) 5627 0210</p>
    </div>

    <div class="footer-section">
        <h5>CAMPUS SUR</h5>
        <p>Av. de los Tanques no. 865, Col. Torres de Potrero,
            Ciudad de México, Alcaldía Álvaro Obregón, México,
        </p>
        <p>Conmutador: +52 (55) 5628 8800</p>
    </div>
</footer>

</body>
</html>
