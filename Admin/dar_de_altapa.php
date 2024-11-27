<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "radio_anahuac"; 

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
    $id_programa = intval($_POST["id_programa"]);
    $id_hora = intval($_POST["id_hora"]);

    // Preparar y ejecutar consulta SQL para insertar datos
    $sql = "INSERT INTO parrilla (id_programa, id_hora) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_programa, $id_hora);

    if ($stmt->execute()) {
        $message = "Registro de parrilla realizado exitosamente.";
    } else {
        $message = "Error al registrar en parrilla: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Alta</title>
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
    <h1>Resultado de Alta</h1>
    <div class="message <?= strpos($message, 'Error') !== false ? 'error' : 'success' ?>">
        <?= $message ?>
        <a href="../Admin/index_admin.php" class="btn btn-outline-dark">Volver a la página principal del admin</a>
    </div>
</body>
</html>
