<?php
// Iniciar el contador 
if (isset($_COOKIE['contador'])) {
    $contador = $_COOKIE['contador'] + 1;
    setcookie('contador', $contador, time() + (86400 * 30), "/"); // Cookie válida por 30 días
} else {
    $contador = 1;
    setcookie('contador', $contador, time() + (86400 * 30), "/"); // Cookie válida por 30 días
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <h1><?php echo $contador == 1 ? "¡Bienvenido a nuestra página!" : "Has visitado esta página $contador veces"; ?></h1>
    <p><a href="index.php">Volver a la página principal</a></p>
</body>
</html>
