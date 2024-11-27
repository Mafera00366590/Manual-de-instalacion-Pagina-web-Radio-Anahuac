<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <!-- Favicon-->
      <link rel="icon" type="image/x-icon" href="../images/favicon.png" />
    <title>Panel de Administrador</title>
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
    background-color: #ff8200;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    color: #333;
    text-align: center;
}

form {
    margin-bottom: 20px;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
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

.btn-secondary {
    background-color: #6c757d;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

    </style>
</head>
<body>
    <h1>Panel de Administrador</h1>
            <div>
            <h2>Consultar Base de dato Radio Anáhuac</h2>
            <form action="consultar_tablas.php" method="POST">
                <button type="submit">Consultar</button>
            </form>
        </div>

        <div>
            <h2>Alta o Baja</h2>
            <form action="alta_baja.php" method="POST">
                <button type="submit">Alta o baja</button>
            </form>
        </div>

        <div>
        <h2>Modificar datos</h2>
<form action="modificar_locutor.php" method="POST">
    <button type="submit">Modificar Locutor</button>
</form>

<form action="modificar_programa.php" method="POST">
    <button type="submit">Modificar Programa</button>
</form>

<form action="modificar_parrilla.php" method="POST">
    <button type="submit">Modificar Parrilla</button>
</form>

        </div>
</body>
</html>
