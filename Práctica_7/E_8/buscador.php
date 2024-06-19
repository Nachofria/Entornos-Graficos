<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Canciones</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Buscador de Canciones</h1>
        <form action="buscador.php" method="GET">
            <label for="buscar">Buscar canción:</label>
            <input type="text" id="buscar" name="buscar" value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
            <button type="submit">Buscar</button>
        </form>

        <div class="resultados">
            <?php
            // Incluir archivo de configuración de la base de datos
            require_once 'config.php';

            // Configuración de paginación
            $resultados_por_pagina = 5; // Número de resultados por página
            $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $inicio = ($pagina_actual - 1) * $resultados_por_pagina;

            // Procesar el formulario
            if (isset($_GET['buscar'])) {
                $busqueda = $_GET['buscar'];

                // Consulta SQL con paginación
                $sql = "SELECT * FROM buscador WHERE cancion LIKE '%$busqueda%' LIMIT $inicio, $resultados_por_pagina";
                $resultado = $conexion->query($sql);

                // Consulta para contar el número total de resultados
                $sql_total = "SELECT COUNT(*) AS total FROM buscador WHERE cancion LIKE '%$busqueda%'";
                $resultado_total = $conexion->query($sql_total);
                $fila_total = $resultado_total->fetch_assoc();
                $total_resultados = $fila_total['total'];

                if ($resultado->num_rows > 0) {
                    echo "<h2>Resultados de la búsqueda:</h2>";
                    echo "<ul>";
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($fila['cancion']) . "</li>";
                    }
                    echo "</ul>";

                    // Calcula el número total de páginas
                    $total_paginas = ceil($total_resultados / $resultados_por_pagina);

                    // Genera los enlaces de paginación
                    echo "<div class='paginacion'>";
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        if ($i == $pagina_actual) {
                            echo "<span class='pagina_actual'>$i</span>";
                        } else {
                            echo "<a href='buscador.php?buscar=$busqueda&pagina=$i'>$i</a>";
                        }
                    }
                    echo "</div>";
                } else {
                    echo "<p>No se encontraron resultados para '$busqueda'.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
