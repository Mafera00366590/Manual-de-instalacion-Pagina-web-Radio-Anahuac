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

$message = "";

// Verificar si se enviaron los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_locutor = intval($_POST["id_locutor"]);
    $nombre_locutor = $_POST["nombre_locutor"];
    $id_programa = intval($_POST["id_programa"]);
    $nombre_programa = $_POST["nombre_programa"];
    
    // Verificar si el ID del locutor existe en la base de datos
    $sql = "SELECT * FROM locutores WHERE id_locutor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_locutor);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Actualizar los datos del locutor y programa
        $sql = "UPDATE locutores 
                SET nombre_locutor = ?, id_programa = ?, nombre_programa = ? 
                WHERE id_locutor = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisi", $nombre_locutor, $id_programa, $nombre_programa, $id_locutor);
        
        if ($stmt->execute()) {
            $message = "Datos del locutor y programa actualizados correctamente.";
        } else {
            $message = "Error al actualizar los datos del locutor y programa.";
        }
    } else {
        $message = "El locutor con el ID proporcionado no existe.";
    }
    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos del Locutor</title>
    <a href="../Admin/index_admin.php" class="btn btn-outline-dark">Volver a la página principal del admin</a>

    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .message { font-size: 18px; font-weight: bold; }
        .success { color: green; }
        .error { color: red; }
        form { display: inline-block; text-align: left; margin-top: 20px; }
        div { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; margin-bottom: 5px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h1>Modificar Datos del Locutor</h1>
    <br>
    <!-- Formulario de modificación de datos -->
    <form method="POST" action="">
        <!-- Datos del Locutor -->
        <div>
            <label for="id_locutor">ID Locutor:</label>
            <input type="number" name="id_locutor" required>
        </div>
        <div>
            <label for="nombre_locutor">Nuevo nombre del locutor:</label>
            <input type="text" name="nombre_locutor" required>
        </div>
        <div>
            <label for="id_programa">ID Programa:</label>
            <input type="number" name="id_programa" required>
        </div>
        <div>
            <label for="nombre_programa">Nuevo nombre del programa:</label>
            <input type="text" name="nombre_programa" required>
        </div>
        <div>
            <button type="submit">Modificar</button>
        </div>
    </form>

    <div class="message <?= strpos($message, 'Error') !== false ? 'error' : 'success' ?>">
        <?= $message ?>
    </div>
</body>
</html>
