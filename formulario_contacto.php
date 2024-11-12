<?php
include 'verificar_sesion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        header {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            margin: 0 20px;
        }
        header nav {
            margin-right: 20px;
        }
        header nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            margin-left: 10px;
        }
        .container {
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }
        h1 {
            font-size: 20px;
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
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            cursor: pointer;
        }
        .button.save {
            background-color: #4CAF50;
        }
        .button.save:hover {
            background-color: #45a049;
        }
        .button.view {
            background-color: #45a049;
        }
        .button.view:hover {
            background-color: #45a049;
        }
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<!-- Encabezado -->
<header>
    <h1>Taller de Costura</h1>
    <nav>
        <a href="formulario_contacto.php">Inicio</a>
        <a href="logout.php">Cerrar Sesión</a>
    </nav>
</header>

<!-- Contenido principal -->
<div class="container">
    <h1>Agregar Contacto de WhatsApp</h1>
    <form action="guardar_contacto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" required>

        <input type="submit" value="Guardar Contacto" class="button save">
    </form>
    <!-- Botones para ver lista de contactos, buscar y eliminar -->
    <div class="button-group">
        <a href="ver_contacto.php">
            <button class="button view">Ver Lista de Contactos</button>
        </a>
        <a href="buscar_contacto.php">
            <button class="button view">Buscar Contacto</button>
        </a>
        <a href="eliminar_contacto.html">
            <button class="button view">Eliminar Contacto</button>
        </a>
    </div>
</div>
</body>
</html>
