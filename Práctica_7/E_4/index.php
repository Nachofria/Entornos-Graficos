<?php
// Verificar si se ha enviado el formulario y establecer la cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipoNoticia = $_POST['tipo-noticia'];
    setcookie('tipoNoticia', $tipoNoticia, time() + (86400 * 30), "/"); // Cookie válida por 30 días
    // Redirigir para mostrar el titular seleccionado inmediatamente
    header("Location: mostrar_noticia.php");
    exit();
} else {
    // Verificar si existe la cookie de tipo de noticia
    $tipoNoticia = isset($_COOKIE['tipoNoticia']) ? $_COOKIE['tipoNoticia'] : '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico Virtual</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Periódico Virtual</h1>
        <form method="POST">
            <p>Seleccione el tipo de titular:</p>
            <div class="radio-group">
                <label>
                    <input type="radio" name="tipo-noticia" value="politica" <?php echo $tipoNoticia == 'politica' ? 'checked' : ''; ?>>
                    Noticia política
                </label>
                <label>
                    <input type="radio" name="tipo-noticia" value="economica" <?php echo $tipoNoticia == 'economica' ? 'checked' : ''; ?>>
                    Noticia económica
                </label>
                <label>
                    <input type="radio" name="tipo-noticia" value="deportiva" <?php echo $tipoNoticia == 'deportiva' ? 'checked' : ''; ?>>
                    Noticia deportiva
                </label>
            </div>
            <button type="submit">Ver Titular</button>
        </form>
        <p><a href="borrar_cookie.php">Borrar Preferencia de Titular</a></p>
    </div>
</body>
</html>
