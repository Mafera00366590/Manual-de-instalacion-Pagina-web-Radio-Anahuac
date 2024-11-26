<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Anáhuac Programas</title>
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
        <a href="programas.php" class="btn active">Programas</a>
        <a href="locutores.php" class="btn">Locutores</a>
        <a href="parilla.php" class="btn">Parrilla</a>
    </div>

    <div class="day-buttons">
        <a href="?dia=LUNES" class="day-button">Lunes</a>
        <a href="?dia=MARTES" class="day-button">Martes</a>
        <a href="?dia=MIERCOLES" class="day-button">Miércoles</a>
        <a href="?dia=JUEVES" class="day-button">Jueves</a>
        <a href="?dia=VIERNES" class="day-button">Viernes</a>
        <a href="?dia=TODOS" class="day-button">Todos</a> 
    </div>

    <div class="programs">
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

    // Obtener el día seleccionado
    $dia = isset($_GET['dia']) ? $_GET['dia'] : 'TODOS';

    // Consulta para obtener los programas, excluyendo aquellos de "música" y uniendo con la tabla de horarios
    if ($dia === 'TODOS') {
        $sql = "SELECT p.id_programa, p.nombre, p.descripcion, p.imagen, h.dia, h.h_inicio, h.h_fin 
                FROM programas AS p
                JOIN horario AS h ON p.horario = h.id_horario
                WHERE p.nombre NOT LIKE 'Musica' 
                ORDER BY h.dia, h.h_inicio";
    } else {
        $sql = "SELECT p.id_programa, p.nombre, p.descripcion, p.imagen, h.dia, h.h_inicio, h.h_fin 
                FROM programas AS p
                JOIN horario AS h ON p.horario = h.id_horario
                WHERE h.dia LIKE ? AND p.nombre NOT LIKE 'Musica'
                ORDER BY h.h_inicio";
    }

    $stmt = $conn->prepare($sql);
    if ($dia !== 'TODOS') {
        $searchTerm = '%' . $dia . '%';
        $stmt->bind_param("s", $searchTerm);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    // Mostrar los programas
    echo "<h2>Programas de " . ($dia === 'TODOS' ? 'Todos los Días' : $dia) . "</h2>";
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead><tr><th>Imagen</th><th>Nombre</th><th>Día</th><th>Hora de Inicio</th><th>Hora de Fin</th><th>Detalles</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='../fotos_programas/" . htmlspecialchars($row['imagen']) . "' alt='Imagen del programa' style='width:75px;height:50px;'></td>";
            echo "<td><a href='info_programa.php?id_programa=" . $row['id_programa'] . "'>" . htmlspecialchars($row['nombre']) . "</a></td>";
            echo "<td>" . htmlspecialchars($row['dia']) . "</td>";
            echo "<td>" . htmlspecialchars($row['h_inicio']) . "</td>";
            echo "<td>" . htmlspecialchars($row['h_fin']) . "</td>";
            echo "<td><a href='info_programa.php?id_programa=" . $row['id_programa'] . "' class='btn'>Ver detalles</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No hay programas para el $dia.</p>";
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
