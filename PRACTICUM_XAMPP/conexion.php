<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Conexión a la Base de Datos</title>
</head>
<body>
    <h1>Prueba de Conexión a la Base de Datos</h1>
    <?php
    // Configuración de la base de datos
    $servername = "localhost";  // Cambia a "localhost" o "localhost:3333" si cambiaste el puerto
    $username = "root";         // Por defecto, el nombre de usuario es "root"
    $password = "";             // Generalmente, no hay contraseña por defecto
    $database = "radio_anahuac"; // Cambia esto al nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        echo "<p style='color: red;'>Error de conexión: " . $conn->connect_error . "</p>";
    } else {
        echo "<p style='color: green;'>Conexión exitosa a la base de datos</p>";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
