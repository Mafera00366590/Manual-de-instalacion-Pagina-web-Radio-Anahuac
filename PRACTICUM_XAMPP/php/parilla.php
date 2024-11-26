<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="icon" href="../images/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parrilla Radio Anáhuac</title>
    <!-- Enlaze el archivo CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            align: center;
        }
        table {
            width:100%;
            border-collapse: collapse;
            margin-top: 0 auto;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            background-color: #ff6600;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
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
        <a href="../hmtl/conocenos.html" class="btn">Conócenos</a>
        <a href="programas.php" class="btn">Programas</a>
        <a href="locutores.php" class="btn active">Locutores</a>
        <a href="parilla.php" class="btn">Parrilla</a>
    </div>
<body>

<h2 style="text-align: center;">Parrilla Programática</h2>

<table>
    <tr>
        <th class="header">Horario</th>
        <th class="header">Lunes</th>
        <th class="header">Martes</th>
        <th class="header">Miércoles</th>
        <th class="header">Jueves</th>
        <th class="header">Viernes</th>
        <th class="header">Sábado</th>
        <th class="header">Domingo</th>
    </tr>

    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "radio_anahuac";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para obtener la programación organizada
    $sql = "
        SELECT 
            p.nombre AS programa_nombre, 
            h.dia, 
            h.h_inicio, 
            h.h_fin, 
            pa.id_hora
        FROM 
            parrilla pa
        JOIN 
            programas p ON pa.id_programa = p.id_programa
        JOIN 
            horario h ON pa.id_hora = h.id_horario
        ORDER BY 
            pa.id_hora, FIELD(h.dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo')
    ";

    $resultado = $conn->query($sql);

    // Crear una estructura para organizar la parrilla
    $parrilla = [];
    $horarios = [];

    while ($fila = $resultado->fetch_assoc()) {
        $hora = "{$fila['h_inicio']} - {$fila['h_fin']}";
        $dia = $fila['dia'];
        $programa = $fila['programa_nombre'];

        // Organiza la parrilla por hora y día
        $parrilla[$hora][$dia] = $programa;

        // Guarda los horarios únicos
        if (!in_array($hora, $horarios)) {
            $horarios[] = $hora;
        }
    }

    // Generar las filas de la tabla
    foreach ($horarios as $hora) {
        echo "<tr>";
        echo "<td><strong>$hora</strong></td>";
        
        // Mostrar cada día de la semana
        foreach (['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $dia) {
            echo "<td>" . ($parrilla[$hora][$dia] ?? '') . "</td>";
        }

        echo "</tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>