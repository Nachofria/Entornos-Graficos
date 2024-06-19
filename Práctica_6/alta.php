<?php
$link = mysqli_connect("localhost", "tu_usuario", "tu_contraseña", "Capitales");

if (!$link) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$habitantes = $_POST['habitantes'];
$superficie = $_POST['superficie'];
$tieneMetro = $_POST['tieneMetro'];

$sql = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";

if (mysqli_query($link, $sql)) {
    echo "Nueva ciudad agregada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
?>
