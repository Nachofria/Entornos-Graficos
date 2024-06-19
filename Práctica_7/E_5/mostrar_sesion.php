<?php
// Iniciar la sesión
session_start();

// Verificar si existen las variables de sesión
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'No se ha iniciado sesión';
$clave = isset($_SESSION['clave']) ? $_SESSION['clave'] : '';

// Destruir la sesión para limpiar las variables de sesión (opcional)
// session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sesión Activa</h1>
        <p>Usuario: <?php echo htmlspecialchars($usuario); ?></p>
        <p>Clave: <?php echo htmlspecialchars($clave); ?></p>
        <p><a href="index.php">Volver al Inicio de Sesión</a></p>
    </div>
</body>
</html>
