<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "Compras");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM catalogo");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <style>
        /* Estilos CSS */
        /* Aquí puedes agregar estilos según tu preferencia */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        .product img {
            width: 100px;
            margin-right: 10px;
        }
        .product h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .product p {
            margin: 5px 0;
            color: #777;
        }
        .product form {
            margin-left: auto;
        }
        .cart-button {
            margin-bottom: 20px;
        }
        .cart-button a {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .cart-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Catálogo de Productos</h1>
    </header>
    <div class="container">
        <div class="cart-button">
            <a href="vercarrito.php">Ver Carrito</a>
        </div>
        <div class="products">
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <div class="product">
                    <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $row['producto']; ?>">
                    <div>
                        <h2><?php echo $row['producto']; ?></h2>
                        <p>Precio: $<?php echo number_format($row['precio'], 2); ?></p>
                    </div>
                    <form action="agregarcar.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Agregar al Carrito">
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Tienda de Productos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
