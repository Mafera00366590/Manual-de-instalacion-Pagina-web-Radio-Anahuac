<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locutores de Radio Anáhuac</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Enlazamos el archivo CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align:center;
        }
        .locutores-table {
            width: 80%; /* Cambiar el ancho de la tabla a 80% */
            max-width: 800px; /* Ancho máximo de 800px */
            margin: 20px auto; /* Centrar la tabla con márgenes automáticos */
            border-collapse: collapse;
        }
        .locutores-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        .locutores-table td img {
            width: 100px; /* Ajusta el tamaño de la imagen si es necesario */
            height: auto;
        }
        .locutores-btn {
            display: inline-block;
            padding: 8px 12px;
            background-color: #e0e0e0; /* Color gris claro */
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .locutores-btn:hover {
            background-color: #d0d0d0; /* Color gris más oscuro al pasar el mouse */
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

    <h2 style="text-align: center;">Locutores</h2>
    <table class="locutores-table">
        <tbody>
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

// Consulta para obtener todos los locutores
$sql = "SELECT id_locutor, nombre_locutor FROM locutores";
$result = $conn->query($sql);

// Inicializar una variable para contar los locutores
$count = 0;

// Mostrar locutores en la tabla
    // Mostrar locutores en la tabla
    if ($result->num_rows > 0) {
        // Iniciar una nueva fila para los locutores
        echo "<tr>";
        while ($row = $result->fetch_assoc()) {
            $id_locutor = $row['id_locutor'];
            $nombre = $row['nombre_locutor'];

            // Crear una celda para cada locutor
            echo "<td>
                    <strong>" . htmlspecialchars($nombre) . "</strong><br>
                    <a href='info_locutores.php?id_locutor=" . $id_locutor . "' class='locutores-btn'>Más información</a>
                  </td>";

            $count++;

            // Cerrar la fila después de 4 columnas
            if ($count % 4 == 0) {
                echo "</tr><tr>"; // Cierra la fila y comienza una nueva
            }
        }

        // Si el número de locutores no es múltiplo de 4, asegurarse de cerrar la última fila
        if ($count % 4 != 0) {
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No hay locutores registrados.</td></tr>";
    }

 
$conn->close();
?>

        </tbody>
    </table>

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
