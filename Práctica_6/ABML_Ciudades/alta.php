<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Capitales";

$link = mysqli_connect($servername, $username, $password, $database);

if (!$link) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

$ciudad = $_POST['ciudad'] ?? '';
$pais = $_POST['pais'] ?? '';
$habitantes = $_POST['habitantes'] ?? '';
$superficie = $_POST['superficie'] ?? '';
$tieneMetro = $_POST['tieneMetro'] ?? '';

$sql = "INSERT INTO Ciudad (ciudad, pais, habitantes, superficie, tieneMetro) VALUES ('$ciudad', '$pais', '$habitantes', '$superficie', '$tieneMetro')";

if (mysqli_query($link, $sql)) {
    echo "Ciudad agregada exitosamente.";
} else {
    echo "Error al agregar la ciudad: " . mysqli_error($link);
}

mysqli_close($link);
?>
