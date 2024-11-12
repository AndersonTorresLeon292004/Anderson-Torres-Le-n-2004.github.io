<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conexion->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";

    // Generación del HTML con estilos en PHP
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
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
                color: #333;
            }
            p {
                font-size: 16px;
                color: #4CAF50;
                margin-bottom: 20px;
            }
            .button-login {
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 14px;
                font-weight: bold;
                color: white;
                background-color: #007BFF;
                text-decoration: none;
                display: inline-block;
            }
            .button-login:hover {
                background-color: #0069D9;
            }
        </style>
    </head>
    <body>
        <div class="container">';

    if ($conexion->query($sql) === TRUE) {
        echo '<h2>Registro Exitoso</h2>';
        echo '<p>Tu cuenta ha sido creada correctamente.</p>';
        echo '<a href="login.php" class="button-login">Inicia sesión aquí</a>';
    } else {
        echo '<h2>Error en el Registro</h2>';
        echo '<p>Hubo un problema: ' . $conexion->error . '</p>';
    }

    echo '</div>
    </body>
    </html>';
}

$conexion->close();
?>
