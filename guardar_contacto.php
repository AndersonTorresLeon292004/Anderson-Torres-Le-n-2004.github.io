<?php
include 'verificar_sesion.php';
include 'config.php';

// Inicializar la variable $mensaje para evitar advertencias
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $numero = $conexion->real_escape_string($_POST['numero']);
    $user_id = $_SESSION['user_id']; // Asegúrate de que esta variable está configurada

    $sql = "INSERT INTO contactos (nombre, numero, user_id) VALUES ('$nombre', '$numero', '$user_id')";

    if ($conexion->query($sql) === TRUE) {
        $mensaje = "Contacto guardado con éxito.";
    } else {
        $mensaje = "Error al guardar el contacto: " . $conexion->error;
    }

    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Guardar Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .message {
            padding: 10px;
            margin: 20px 0;
            font-size: 16px;
            font-weight: bold;
            color: white;
            border-radius: 5px;
        }
        .success {
            background-color: #4CAF50;
        }
        .error {
            background-color: #f44336;
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
        }
        .button:hover {
            background-color: #0069D9;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Mostrar el mensaje solo si está definido y no está vacío -->
    <?php if (!empty($mensaje)) : ?>
        <div class="message <?php echo $mensaje == 'Contacto guardado con éxito.' ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>

    <a href="formulario_contacto.php" class="button">Volver al formulario</a>
</div>

</body>
</html>
