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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_locutor"])) {
    $id_locutor = intval($_POST["id_locutor"]);

    // Consulta para eliminar el registro
    $sql = "DELETE FROM locutores WHERE id_locutor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_locutor);

    if ($stmt->execute()) {
        $message = "Registro eliminado correctamente.";
    } else {
        $message = "Error al eliminar el registro: " . $conn->error;
    }
    $stmt->close();
}

// Consultar todos los registros de la tabla locutores
$sql = "SELECT * FROM locutores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de Baja Locutores</title>
    
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
    <h1>Dar de Baja Locutores</h1>
    <a href="../Admin/index_admin.php" class="btn btn-outline-dark">Volver a la página principal del admin</a>

    
    <?php if ($message): ?>
        <p class="<?= strpos($message, 'Error') !== false ? 'error' : 'message' ?>"><?= $message ?></p>
    <?php endif; ?>

    <h2>Seleccionar Locutor</h2>
    <form method="POST">
        <label for="id_locutor">Seleccione un locutor:</label>
        <select name="id_locutor" id="id_locutor" required>
            <option value="">-- Seleccione --</option>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?= $row["id_locutor"] ?>">
                        <?= $row["id_locutor"] . " - " . htmlspecialchars($row["nombre_locutor"]) ?>
                    </option>
                <?php endwhile; ?>
            <?php else: ?>
                <option value="">No hay locutores disponibles</option>
            <?php endif; ?>
        </select>
        <br><br>
        <button type="submit">Dar de Baja</button>
    </form>

    <h2>Detalles de Locutores</h2>
    <table>
        <thead>
            <tr>
                <th>ID Locutor</th>
                <th>Nombre Locutor</th>
                <th>Nombre Programa</th>
                <th>ID Programa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Volver a ejecutar la consulta para mostrar los registros restantes
            $result = $conn->query($sql);
            if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["id_locutor"]) ?></td>
                        <td><?= htmlspecialchars($row["nombre_locutor"]) ?></td>
                        <td><?= htmlspecialchars($row["nombre_programa"]) ?></td>
                        <td><?= htmlspecialchars($row["id_programa"]) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay locutores registrados.</td>
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
