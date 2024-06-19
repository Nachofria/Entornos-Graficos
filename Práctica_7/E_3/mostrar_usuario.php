<?php
// Verificar si existe la cookie de último usuario
$ultimoUsuario = isset($_COOKIE['ultimoUsuario']) ? $_COOKIE['ultimoUsuario'] : 'No se ha guardado ningún usuario aún.';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Último Usuario Guardado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Último Usuario Guardado</h1>
        <p><?php echo htmlspecialchars($ultimoUsuario); ?></p>
        <a href="index.php">Volver al Formulario</a>
    </div>
</body>
</html>
