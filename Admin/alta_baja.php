<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Alta o baja</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../images/favicon.png"/>
    <link href="../css/styles.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #ff8200;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #666;
        }
    </style>
</head>
<body>
     <a href="../Admin/index_admin.php" class="btn btn-outline-dark">Volver a la página principal del admin</a>
    <div class="container">
        <!--PROGRAMAS -->
        <h1>Alta o Baja de Programa</h1>
        <div>
            <h2>Dar de Baja Programa</h2>
            <form action="dar_de_bajap.php" method="POST">
                <button type="submit">Dar de Baja</button>
            </form>
        </div>

        <div>
            <h2>Alta de Programa</h2>
            <form action="dar_de_altap.php" method="POST" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" required>
                <label for="link">Link de ivoox Si no tiene dejar en blanco:</label>
                <input type="text" id="link" name="link" >
                <label for="imagen">imagen:</label>
                <input type="file" id="imagen" name="imagen" required>
                <label for="id_horario">id horario correspondiente:</label>
                <input type="number" id="id_horario" name="id_horario" required>
                <button type="submit">Dar de Alta</button>
            </form>
        </div>
        <div class="container">
        <!--Locutores -->
        <h1>Alta o Baja de Locutor</h1>
        <div>
            <h2>Dar de Baja Locutor</h2>
            <form action="dar_de_bajal.php" method="POST">
                <button type="submit">Dar de Baja</button>
            </form>
        </div>

        <div>
            <h2>Alta de Locutor</h2>
            <form action="dar_de_altal.php" method="POST" enctype="multipart/form-data">
                <label for="nombre_locutor">Nombre locutor:</label>
                <input type="text" id="nombre_locutor" name="nombre_locutor" required>
                <label for="programa">Nombre programa:</label>
                <input type="text" id="programa" name="programa" required>
                <label for="id_programa">id del programa:</label>
                <input type="number" id="id_programa" name="id_programa" required>
                <button type="submit">Dar de Alta</button>
            </form>
        </div>
        <div class="container">
        <!--Parrilla -->
        <h1>Alta o Baja de parrilla</h1>
        <div>
            <h2>Dar de Baja parrilla</h2>
            <form action="dar_de_bajapa.php" method="POST">
                <button type="submit">Dar de Baja</button>
            </form>
        </div>

        <div>
            <h2>Alta de parrilla</h2>
            <form action="dar_de_altapa.php" method="POST" enctype="multipart/form-data">
                <label for="id_programa">id del programa:</label>
                <input type="number" id="id_programa" name="id_programa" required>
                <label for="id_hora"> id del horario:</label>
                <input type="number" id="id_hora" name="id_hora" required>
                <button type="submit">Dar de Alta</button>
            </form>
        </div>
        <a href="../Admin/index_admin.php" class="btn btn-outline-dark">Volver a la página principal del admin</a>

    </div>
</body>
</html>
