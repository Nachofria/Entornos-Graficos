<?php
// Verificar si existe la cookie de tipo de noticia
$tipoNoticia = isset($_COOKIE['tipoNoticia']) ? $_COOKIE['tipoNoticia'] : 'No se ha seleccionado ningún titular aún.';

// Definir los titulares según el tipo de noticia seleccionado
switch ($tipoNoticia) {
    case 'politica':
        $titular = "Titular de Noticia Política";
        break;
    case 'economica':
        $titular = "Titular de Noticia Económica";
        break;
    case 'deportiva':
        $titular = "Titular de Noticia Deportiva";
        break;
    default:
        $titular = "No se ha seleccionado ningún titular aún.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titular de Noticia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Titular de Noticia</h1>
        <p><?php echo htmlspecialchars($titular); ?></p>
        <a href="index.php">Volver al Periódico</a>
    </div>
</body>
</html>
