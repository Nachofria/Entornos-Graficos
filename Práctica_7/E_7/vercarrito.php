<?php
session_start();

// Verificar si existe el carrito en la sesión
if (isset($_SESSION['carro']) && !empty($_SESSION['carro'])) {
    $carro = $_SESSION['carro'];
} else {
    // Si no hay productos en el carrito, redirigir de vuelta al catálogo
    header("Location: catalogo.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        /* Estilos CSS */
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
        .total {
            margin-top: 20px;
            font-size: 18px;
        }
        .total span {
            font-weight: bold;
        }
        .cart-buttons {
            margin-top: 20px;
        }
        .cart-buttons a {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        .cart-buttons a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Carrito de Compras</h1>
    </header>
    <div class="container">
        <div class="cart-buttons">
            <a href="catalogo.php">Seguir Comprando</a>
            <a href="borrarcar.php">Vaciar Carrito</a>
        </div>
        <div class="products">
            <?php foreach ($carro as $producto): ?>
                <div class="product">
                    <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['producto']; ?>">
                    <div>
                        <h2><?php echo $producto['producto']; ?></h2>
                        <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                        <p>Cantidad: <?php echo $producto['cantidad']; ?></p>
                        <form action="borrarcar.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <input type="submit" value="Quitar del Carrito">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="total">
            <p>Total: <span>$<?php echo number_format(calcularTotal($carro), 2); ?></span></p>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Tienda de Productos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

<?php
// Función para calcular el total del carrito
function calcularTotal($carro) {
    $total = 0;
    foreach ($carro as $producto) {
        $total += $producto['precio'] * $producto['cantidad'];
    }
    return $total;
}
?>
