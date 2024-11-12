<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $contact_id = $conexion->real_escape_string($_GET['id']);
    $user_id = $_SESSION['user_id'];

    // Eliminar el contacto solo si pertenece al usuario actual
    $sql = "DELETE FROM contactos WHERE id = '$contact_id' AND user_id = '$user_id'";
    if ($conexion->query($sql) === TRUE) {
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
    echo "<p>ID de contacto no especificado.</p>";
    echo "<a href='buscar_contacto.php' class='button'>Volver al formulario</a>";
    echo "</div>";
}

$conexion->close();
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
