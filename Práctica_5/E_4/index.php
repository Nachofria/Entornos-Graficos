<?php
    session_start();
    if (!isset($_SESSION['page_count'])) {
        $_SESSION['page_count'] = 0;
    }
    $_SESSION['page_count']++;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Páginas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1, h2, p {
            margin: 0 0 20px 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #0366d6;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a mi sitio web</h1>
        <p>Has visitado <?php echo $_SESSION['page_count']; ?> páginas en esta sesión.</p>
        <p>Continúa visitando:</p>
        <ul>
            <li><a href="page1.php">Página 1</a></li>
            <li><a href="page2.php">Página 2</a></li>
            <!-- Agrega más enlaces a otras páginas aquí -->
        </ul>
    </div>
</body>
</html>
