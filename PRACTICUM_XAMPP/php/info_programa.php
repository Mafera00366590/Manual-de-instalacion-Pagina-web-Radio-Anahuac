<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Programa</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .program-info {
            display: flex;
            justify-content: flex-start;
            gap: 20px;
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            align-items: flex-start;
        }

        .program-image-container {
            flex: 0 0 120px; /* Imagen más pequeña */
            max-width: 120px; /* Limitar el tamaño de la imagen */
        }

        .program-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .program-description {
            flex: 1;
            max-width: 700px;
        }

        iframe {
            margin-top: 20px;
            width: 100%;
            height: 400px;
            border-radius: 5px;
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
    <a href="locutores.php" class="btn">Locutores</a>
    <a href="parilla.php" class="btn">Parrilla</a>
</div>

<div class="program-detail">
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

// Obtener el ID del programa desde la URL
$id = isset($_GET['id_programa']) ? $_GET['id_programa'] : 0;

// Consulta para obtener los detalles del programa, agrupando locutores
$sql = "SELECT p.nombre AS programa_nombre, p.descripcion, p.imagen, p.links, 
               GROUP_CONCAT(l.nombre_locutor ORDER BY l.nombre_locutor ASC) AS locutores,
               h.dia, h.h_inicio, h.h_fin
        FROM programas p
        LEFT JOIN locutores l ON p.id_programa = l.id_programa
        LEFT JOIN horario h ON p.horario = h.id_horario
        WHERE p.id_programa = ?
        GROUP BY p.id_programa, p.nombre, p.descripcion, p.imagen, p.links, h.dia, h.h_inicio, h.h_fin";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Mostrar detalles del programa
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h1>" . htmlspecialchars($row['programa_nombre']) . "</h1>";
        echo "<div class='program-info'>";
        
        // Mostrar imagen del programa a la izquierda
        echo "<div class='program-image-container'>";
        echo "<img src='../fotos_programas/" . htmlspecialchars($row['imagen']) . "' alt='Imagen del programa' class='program-image'>";
        echo "</div>";
        
        // Descripción y detalles adicionales
        echo "<div class='program-description'>";
        echo "<p>" . htmlspecialchars($row['descripcion']) . "</p>";
        
        // Mostrar los locutores, si hay más de uno se muestran todos los nombres
        echo "<p><strong>Locutores: </strong>" . htmlspecialchars($row['locutores']) . "</p>";
        
        echo "<p><strong>Día: </strong>" . htmlspecialchars($row['dia']) . "</p>";
        echo "<p><strong>Hora: </strong>" . htmlspecialchars($row['h_inicio']) . " - " . htmlspecialchars($row['h_fin']) . "</p>";
        
        // Reproductor de Ivoox si el enlace está disponible
        if (!empty($row['links'])) {
            echo "<p><strong>Escúchalo en Ivoox:</strong></p>";
            echo "<iframe src='" . htmlspecialchars($row['links']) . "' width='100%' height='400' frameborder='0' allow='autoplay'></iframe>";
        }
        
        echo "</div></div>"; // Cerrar descripción y contenedor
    }
} else {
    echo "<p>No se encontró el programa.</p>";
}

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
