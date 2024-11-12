<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            background-color: #007BFF;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .button:hover {
            background-color: #0069D9;
        }
        .button-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Buscar Contacto</h2>
    <form action="buscar_contacto.php" method="post">
        <label for="nombre">Nombre del Contacto:</label>
        <input type="text" name="nombre" required>
        <input type="submit" class="button" value="Buscar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $conexion->real_escape_string($_POST['nombre']);
        $sql = "SELECT id, nombre, numero FROM contactos WHERE nombre = '$nombre' AND user_id = '$user_id'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div style='margin-top: 20px;'>";
            echo "<p>Contacto encontrado:</p>";
            echo "<p>Nombre: " . $row['nombre'] . " - Número: " . $row['numero'] . "</p>";
            echo "<a href='eliminar_contacto.php?id=" . $row['id'] . "' class='button' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este contacto?');\">Eliminar Contacto</a>";
            echo "</div>";
        } else {
            echo "<p>No se encontró el contacto.</p>";
        }
    }
    ?>

    <!-- Botón para volver al formulario -->
    <div class="button-group">
        <a href="formulario_contacto.php" class="button">Volver al Formulario</a>
    </div>
</div>
</body>
</html>
