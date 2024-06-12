<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Capitales";

$link = mysqli_connect($servername, $username, $password, $database);

if (!$link) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

$id = $_POST['id'] ?? '';
$ciudad = $_POST['ciudad'] ?? '';
$pais = $_POST['pais'] ?? '';
$habitantes = $_POST['habitantes'] ?? '';
$superficie = $_POST['superficie'] ?? '';
$tieneMetro = $_POST['tieneMetro'] ?? '';

$sql = "UPDATE Ciudad SET ciudad='$ciudad', pais='$pais', habitantes='$habitantes', superficie='$superficie', tieneMetro='$tieneMetro' WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    echo "Ciudad modificada exitosamente.";
} else {
    echo "Error al modificar la ciudad: " . mysqli_error($link);
}

mysqli_close($link);
?>
