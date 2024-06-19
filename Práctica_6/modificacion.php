<?php
$link = mysqli_connect("localhost", "tu_usuario", "tu_contraseña", "Capitales");

if (!$link) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$id = $_POST['id'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$habitantes = $_POST['habitantes'];
$superficie = $_POST['superficie'];
$tieneMetro = $_POST['tieneMetro'];

$updateFields = [];
if (!empty($ciudad)) $updateFields[] = "ciudad='$ciudad'";
if (!empty($pais)) $updateFields[] = "pais='$pais'";
if (!empty($habitantes)) $updateFields[] = "habitantes=$habitantes";
if (!empty($superficie)) $updateFields[] = "superficie=$superficie";
if (!empty($tieneMetro)) $updateFields[] = "tieneMetro=$tieneMetro";

$updateFieldsStr = implode(', ', $updateFields);

$sql = "UPDATE Ciudades SET $updateFieldsStr WHERE id=$id";

if (mysqli_query($link, $sql)) {
    echo "Ciudad modificada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
?>
