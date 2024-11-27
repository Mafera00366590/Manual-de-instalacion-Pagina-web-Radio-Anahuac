<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "radio_anahuac"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Variable para mensajes
$message = "";

// Verificar si se envió un ID para dar de baja
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_programa"])) {
    $id_programa = intval($_POST["id_programa"]);

    // Consulta para eliminar el registro
    $sql = "DELETE FROM programas WHERE id_programa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_programa);

    if ($stmt->execute()) {
        $message = "Registro eliminado correctamente.";
    } else {
        $message = "Error al eliminar el registro: " . $conn->error;
    }
    $stmt->close();
}

// Consultar todos los registros de la tabla programas
$sql = "SELECT * FROM programas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de Baja Programas</title>
    <br>
    <a href="../Admin/index_admin.php" class="btn btn-outline-dark">Volver a la página principal del admin</a>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .message {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Dar de Baja Programas</h1>
    
    <?php if ($message): ?>
        <p class="<?= strpos($message, 'Error') !== false ? 'error' : 'message' ?>"><?= $message ?></p>
    <?php endif; ?>

    <h2>Seleccionar Programa</h2>
    <form method="POST">
        <label for="id_programa">Seleccione un programa:</label>
        <select name="id_programa" id="id_programa" required>
            <option value="">-- Seleccione --</option>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?= $row["id_programa"] ?>">
                        <?= $row["id_programa"] . " - " . htmlspecialchars($row["nombre"]) ?>
                    </option>
                <?php endwhile; ?>
            <?php else: ?>
                <option value="">No hay programas disponibles</option>
            <?php endif; ?>
        </select>
        <br><br>
        <button type="submit">Dar de Baja</button>
    </form>

    <h2>Detalles de Programas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Links</th>
                <th>Imagen</th>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Volver a ejecutar la consulta para mostrar los registros restantes
            $result = $conn->query($sql);
            if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["id_programa"]) ?></td>
                        <td><?= htmlspecialchars($row["nombre"]) ?></td>
                        <td><?= htmlspecialchars($row["descripcion"]) ?></td>
                        <td><?= htmlspecialchars($row["links"]) ?></td>
                        <td><?= htmlspecialchars($row["imagen"]) ?></td>
                        <td><?= htmlspecialchars($row["horario"]) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay programas registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php
    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
