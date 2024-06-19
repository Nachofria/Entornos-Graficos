<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ciudades";

$link = mysqli_connect($servername, $username, $password, $database);

if (!$link) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

$limit = 5; // número de registros por página
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM Ciudad LIMIT $start, $limit";
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

$sql_total = "SELECT COUNT(*) AS total FROM Ciudad";
$result_total = mysqli_query($link, $sql_total);
$data_total = mysqli_fetch_assoc($result_total);
$total_pages = ceil($data_total['total'] / $limit);

echo "<ul class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li><a href='listado_paginacion.php?page=$i'>$i</a></li>";
}
echo "</ul>";

mysqli_close($link);
?>
