<?php
include 'config.php'; // Incluir el archivo de configuración para la conexión a la base de datos
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirige a la página de login si no está logueado
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el nombre del contacto a eliminar
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $user_id = $_SESSION['user_id']; // Obtener el ID del usuario desde la sesión

    // Buscar el contacto en la base de datos
    $sql = "SELECT id, nombre, numero FROM contactos WHERE nombre = '$nombre' AND user_id = '$user_id'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Si el contacto existe, eliminarlo
        $row = $result->fetch_assoc();
        $delete_sql = "DELETE FROM contactos WHERE id = '" . $row['id'] . "' AND user_id = '$user_id'";

        if ($conexion->query($delete_sql) === TRUE) {
            echo "<div class='message success'>";
            echo "<p>Contacto eliminado exitosamente.</p>";
            echo "<a href='buscar_contacto.php' class='button'>Volver al formulario</a>";
            echo "</div>";
        } else {
            echo "<div class='message error'>";
            echo "<p>Error al eliminar el contacto: " . $conexion->error . "</p>";
            echo "<a href='buscar_contacto.php' class='button'>Volver al formulario</a>";
            echo "</div>";
        }
    } else {
        echo "<div class='message error'>";
        echo "<p>Contacto no encontrado.</p>";
        echo "<a href='buscar_contacto.php' class='button'>Volver al formulario</a>";
        echo "</div>";
    }

    $conexion->close();
}
?>

<!-- Estilos -->
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
    .message {
        width: 300px;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        margin: 20px;
    }
    .success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 10px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        text-decoration: none;
    }
    .button:hover {
        background-color: #0069D9;
    }
</style>
