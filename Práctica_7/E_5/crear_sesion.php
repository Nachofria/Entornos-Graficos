<?php
// Iniciar la sesión
session_start();

// Recoger los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Crear variables de sesión
    $_SESSION['usuario'] = $usuario;
    $_SESSION['clave'] = $clave;

    // Redirigir a la página de mostrar sesión
    header("Location: mostrar_sesion.php");
    exit();
}
?>
