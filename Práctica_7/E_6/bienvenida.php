<?php
session_start();

// Verificar si existe la variable de sesión 'nombre'
if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    echo "¡Bienvenido, $nombre!";
} else {
    // Si no existe la variable de sesión 'nombre', redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
