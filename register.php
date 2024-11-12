<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        /* Configuración general */
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
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-size: 14px;
            color: #333;
            text-align: left;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            background-color: #007BFF;
        }
        input[type="submit"]:hover {
            background-color: #0069D9;
        }
        .button-back {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            background-color: #6c757d;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .button-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Registro de Usuario</h2>
    <form action="process_register.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Registrar">
    </form>
    <br>
    <a href="login.php" class="button-back">Volver al Inicio de Sesión</a>
</div>
</body>
</html>
