<?php
// Verificar si se ha enviado el formulario y establecer la cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    setcookie('ultimoUsuario', $usuario, time() + (86400 * 30), "/"); // Cookie válida por 30 días
    // Redirigir para mostrar el último usuario inmediatamente
    header("Location: mostrar_usuario.php");
    exit();
} else {
    // Verificar si existe la cookie de último usuario
    $ultimoUsuario = isset($_COOKIE['ultimoUsuario']) ? $_COOKIE['ultimoUsuario'] : '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Nombre de Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Nombre de Usuario</h1>
        <form method="POST">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($ultimoUsuario); ?>">
            <button type="submit">Guardar Usuario</button>
        </form>
    </div>
</body>
</html>
