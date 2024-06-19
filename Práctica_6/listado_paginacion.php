<?php
$link = mysqli_connect("localhost", "tu_usuario", "tu_contraseña", "Capitales");

if (!$link) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$registros_por_pagina = 5;
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$inicio = ($pagina-1) * $registros_por_pagina;

$sql = "SELECT * FROM Ciudades LIMIT $inicio, $registros_por_pagina";
$vResultado = mysqli_query($link, $sql);

if (!$vResultado) {
    die("Error en la consulta: " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ciudades con Paginación</title>
</head>
<body>
    <h1>Listado de Ciudades con Paginación</h1>
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
        
        $sql_total = "SELECT COUNT(*) FROM Ciudades";
        $result_total = mysqli_query($link, $sql_total);
        $total_registros = mysqli_fetch_array($result_total)[0];
        $total_paginas = ceil($total_registros / $registros_por_pagina);

        mysqli_close($link);
        ?>
    </table>

    <div>
        <?php
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo "<a href='listado_paginacion.php?pagina=".$i."'>".$i."</a> ";
        }
        ?>
    </div>
</body>
</html>
