<?php
$link = mysqli_connect("localhost", "tu_usuario", "tu_contraseña", "Capitales");

if (!$link) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Ciudades";
$vResultado = mysqli_query($link, $sql);

if (!$vResultado) {
    die("Error en la consulta: " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ciudades</title>
</head>
<body>
    <h1>Listado de Ciudades</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>Habitantes</th>
            <th>Superficie</th>
            <th>Tiene Metro</th>
        </tr>
        <?php
        while ($fila = mysqli_fetch_array($vResultado)) {
        ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['ciudad']; ?></td>
            <td><?php echo $fila['pais']; ?></td>
            <td><?php echo $fila['habitantes']; ?></td>
            <td><?php echo $fila['superficie']; ?></td>
            <td><?php echo $fila['tieneMetro']; ?></td>
        </tr>
        <?php
        }
        mysqli_free_result($vResultado);
        mysqli_close($link);
        ?>
    </table>
</body>
</html>
