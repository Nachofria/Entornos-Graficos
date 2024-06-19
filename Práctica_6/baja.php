<?php
$link = mysqli_connect("localhost", "tu_usuario", "tu_contraseña", "Capitales");

if (!$link) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$id = $_POST['id'];

$sql = "DELETE FROM Ciudades WHERE id=$id";

if (mysqli_query($link, $sql)) {
    echo "Ciudad eliminada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
?>
