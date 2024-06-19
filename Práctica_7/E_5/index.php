<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Inicio de Sesión</h1>
        <form action="crear_sesion.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="clave">Clave:</label>
            <input type="password" id="clave" name="clave" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
