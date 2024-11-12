<?php
include 'verificar_sesion.php';
include 'config.php';

// Asegúrate de que la conexión esté activa antes de cerrar
$query = "SELECT nombre, numero FROM contactos WHERE user_id = '" . $_SESSION['user_id'] . "'";
$result = $conexion->query($query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            background-color: #f44336;
            color: white;
        }

        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Lista de Contactos</h1>

    <!-- Mostrar mensaje si está presente -->
    <?php if (isset($mensaje) && !empty($mensaje)) : ?>
        <div class="message <?php echo isset($mensaje['type']) && $mensaje['type'] === 'success' ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>

    <?php if ($result->num_rows > 0) : ?>
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Número</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['numero']); ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No hay contactos registrados.</p>
    <?php endif; ?>

    <!-- Botón para volver al formulario -->
    <a href="formulario_contacto.php" class="button">Volver al Formulario</a>
</div>
</body>
</html>

<?php
// Solo cierra la conexión una vez al final
$conexion->close();
?>
