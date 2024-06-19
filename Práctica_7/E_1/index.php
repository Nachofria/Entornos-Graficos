<?php
// Verificar si se ha enviado el formulario y establecer la cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedStyle = $_POST['style-select'];
    setcookie('selectedStyle', $selectedStyle, time() + (86400 * 30), "/"); // Cookie válida por 30 días
    // Redirigir para aplicar el nuevo estilo inmediatamente
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
} else {
    // Verificar si existe la cookie de estilo
    $selectedStyle = isset($_COOKIE['selectedStyle']) ? $_COOKIE['selectedStyle'] : 'style1.css';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con estilos configurables</title>
    <link id="theme-stylesheet" rel="stylesheet" href="<?php echo htmlspecialchars($selectedStyle); ?>">
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            transition: background-color 0.3s, color 0.3s;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        label {
            margin-right: 10px;
            font-size: 18px;
        }
        select {
            padding: 5px;
            font-size: 16px;
        }
        button {
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a mi página con estilos configurables</h1>
    <form id="style-form" method="POST">
        <label for="style-select">Elige un estilo:</label>
        <select id="style-select" name="style-select">
            <option value="style1.css" <?php echo $selectedStyle == 'style1.css' ? 'selected' : ''; ?>>Estilo 1</option>
            <option value="style2.css" <?php echo $selectedStyle == 'style2.css' ? 'selected' : ''; ?>>Estilo 2</option>
            <option value="style3.css" <?php echo $selectedStyle == 'style3.css' ? 'selected' : ''; ?>>Estilo 3</option>
        </select>
        <button type="submit">Aplicar estilo</button>
    </form>
    <p>Este es un ejemplo de contenido en la página.</p>
</body>
</html>
