<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Capitales";

$link = mysqli_connect($servername, $username, $password, $database);

if (!$link) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Ciudad";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Ciudad</th><th>País</th><th>Habitantes</th><th>Superficie</th><th>Tiene Metro</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['ciudad']}</td><td>{$row['pais']}</td><td>{$row['habitantes']}</td><td>{$row['superficie']}</td><td>{$row['tieneMetro']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron ciudades.";
}

mysqli_close($link);
?>
