<!DOCTYPE html>
<html></html>
<head>
    <meta charset="UTF-8">
    <title>Práctica 5</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form method="post">
        <input type="text" placeholder="name" name="name">
        <input type="email" placeholder="email" name="email">
        <input type="text" placeholder="asunto" name="asunto">
        <textarea placeholder="mensaje" name="msg"></textarea>
        <input type="submit" name="enviar">
    </form>

<?php
include("correo.php");

?>
</body>
</html>