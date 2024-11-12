<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
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
        .button-login {
            background-color: #4CAF50;
        }
        .button-login:hover {
            background-color: #45a049;
        }
        .button-register {
            background-color: #007BFF;
        }
        .button-register:hover {
            background-color: #0069D9;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Iniciar Sesión</h2>
    <form action="process_login.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Iniciar Sesión" class="button button-login">
    </form>
    <br>
    <a href="register.php">
        <button class="button button-register">Registrarse</button>
    </a>
</div>
</body>
</html>
