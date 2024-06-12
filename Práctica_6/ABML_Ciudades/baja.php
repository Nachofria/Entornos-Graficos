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

$sql = "DELETE FROM Ciudad WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    echo "Ciudad eliminada exitosamente.";
} else {
    echo "Error al eliminar la ciudad: " . mysqli_error($link);
}

mysqli_close($link);
?>
