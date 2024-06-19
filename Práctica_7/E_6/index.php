<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Mail de Alumno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Ingreso de Mail de Alumno</h1>
        <form action="verificar_alumno.php" method="POST">
            <label for="mail">Mail del Alumno:</label>
            <input type="email" id="mail" name="mail" required>
            <button type="submit">Verificar</button>
        </form>
    </div>
</body>
</html>
