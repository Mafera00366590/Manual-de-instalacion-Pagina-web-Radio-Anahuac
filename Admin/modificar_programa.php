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
    $id_programa = intval($_POST["id_programa"]);
    $nombre_programa = $_POST["nombre_programa"];
    $descripcion = $_POST["descripcion"];
    $enlaces = $_POST["enlaces"];
    $id_horario = intval($_POST["id_horario"]);
    
    // Verificar si se ha subido una imagen
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === 0) {
        // Obtener la información del archivo subido
        $nombre_imagen = $_FILES["imagen"]["name"];
        $tmp_nombre = $_FILES["imagen"]["tmp_name"];
        $ruta_destino = "../fotos_programas/" . $nombre_imagen;

        // Mover la imagen a la carpeta especificada
        if (move_uploaded_file($tmp_nombre, $ruta_destino)) {
            $imagen = $ruta_destino;
        } else {
            $imagen = "";
            $message = "Error al subir la imagen.";
        }
    } else {
        // Si no se subió una imagen, no se actualiza el campo de imagen
        $imagen = "";
    }

    // Verificar si el ID del programa existe en la base de datos
    $sql = "SELECT * FROM programas WHERE id_programa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_programa);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Actualizar los datos del programa
        $sql = "UPDATE programas 
                SET nombre = ?, descripcion = ?, enlaces = ?, imagen = ?, id_horario = ? 
                WHERE id_programa = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssii", $nombre_programa, $descripcion, $enlaces, $imagen, $id_horario, $id_programa);
        
        if ($stmt->execute()) {
            $message = "Datos del programa actualizados correctamente.";
        } else {
            $message = "Error al actualizar los datos del programa.";
        }
    } else {
        $message = "El programa con el ID proporcionado no existe.";
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
    <title>Modificar Datos del Programa</title>
    <a href="../Admin/index_admin.php" class="btn btn-outline-dark">Volver a la página principal del admin</a>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .message { font-size: 18px; font-weight: bold; }
        .success { color: green; }
        .error { color: red; }
        form { display: inline-block; text-align: left; margin-top: 20px; }
        div { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 5px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #45a049; }
        input[type="file"] { padding: 5px; }
    </style>
</head>
<body>
    <h1>Modificar Datos del Programa</h1>

    <!-- Formulario de modificación de datos -->
    <form method="POST" action="" enctype="multipart/form-data">
        <!-- Datos del Programa -->
        <div>
            <label for="id_programa">ID Programa:</label>
            <input type="number" name="id_programa" required>
        </div>
        <div>
            <label for="nombre_programa">Nuevo nombre del programa:</label>
            <input type="text" name="nombre_programa" required>
        </div>
        <div>
            <label for="descripcion">Descripción del programa:</label>
            <textarea name="descripcion" rows="4" required></textarea>
        </div>
        <div>
            <label for="enlaces">Enlaces relacionados:</label>
            <input type="text" name="enlaces" placeholder="Ej: https://www.example.com">
        </div>
        <div>
            <label for="imagen">Subir imagen del programa:</label>
            <input type="file" name="imagen" accept="image/*">
        </div>
        <div>
            <label for="id_horario">ID del Horario:</label>
            <input type="number" name="id_horario" required>
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
