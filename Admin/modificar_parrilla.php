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
    $id_parrilla = intval($_POST["id_parrilla"]);
    $id_hora = $_POST["id_hora"];
    
    // Verificar si el ID de la parrilla existe en la base de datos
    $sql = "SELECT * FROM parrilla WHERE id_parrilla = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_parrilla);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Actualizar los datos de la parrilla
        $sql = "UPDATE parrilla SET id_hora = ? WHERE id_parrilla = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id_hora, $id_parrilla);
        
        if ($stmt->execute()) {
            $message = "Datos de la parrilla actualizados correctamente.";
        } else {
            $message = "Error al actualizar los datos de la parrilla.";
        }
    } else {
        $message = "La parrilla con el ID proporcionado no existe.";
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
    <title>Modificar Datos de la Parrilla</title>
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
    <h1>Modificar Datos de la Parrilla</h1>

    <!-- Formulario de modificación de datos -->
    <form method="POST" action="">
        <!-- Datos de la Parrilla -->
        <div>
            <label for="id_parrilla">ID Parrilla:</label>
            <input type="number" name="id_parrilla" required>
        </div>
        <div>
            <label for="id_hora">Nuevo horario:</label>
            <input type="number" name="id_hora" required>
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
