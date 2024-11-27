<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "radio_anahuac";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Mensaje para notificaciones
$message = "";

// Verificar si se enviaron los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $link = $_POST["link"];
    $id_horario = intval($_POST["id_horario"]);
    
    // Subir imagen
    $imagen = $_FILES["imagen"]["name"];  // Obtener solo el nombre del archivo
    $target_dir = "../fotos_programas/"; // Carpeta donde se guardan las imágenes
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);  // Ruta completa para mover la imagen
    
    // Mover la imagen desde el formulario al servidor
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        // Imagen subida correctamente

        // Preparar y ejecutar consulta SQL para insertar datos en programas
        $sql = "INSERT INTO programas (nombre, descripcion, links, imagen, horario) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $descripcion, $link, $imagen, $id_horario);  // Usar solo el nombre de la imagen

        if ($stmt->execute()) {
            $message = "Programa registrado exitosamente.";
        } else {
            $message = "Error al registrar programa: " . $conn->error;
        }
        $stmt->close();
    } else {
        $message = "Error al subir la imagen.";
    }
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Alta Programa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .message {
            font-size: 18px;
            font-weight: bold;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Resultado de Alta Programa</h1>
    <div class="message <?= strpos($message, 'Error') !== false ? 'error' : 'success' ?>">
        <?= $message ?>
        <a href="../Admin/index_admin.php" class="btn btn-outline-dark">Volver a la página principal del admin</a>
    </div>
</body>
</html>
