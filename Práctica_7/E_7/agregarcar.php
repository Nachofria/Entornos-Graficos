<?php
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Conectar a la base de datos
    $conexion = new mysqli("localhost", "root", "", "Compras");

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Obtener información del producto
    $query = "SELECT * FROM catalogo WHERE id = '$id'";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();

        // Inicializar o recuperar carrito de la sesión
        $carro = isset($_SESSION['carro']) ? $_SESSION['carro'] : array();

        // Agregar producto al carrito usando el ID como índice
        $carro[$id] = array(
            'id' => $id,
            'producto' => $producto['producto'],
            'precio' => $producto['precio'],
            'cantidad' => isset($carro[$id]['cantidad']) ? $carro[$id]['cantidad'] + 1 : 1
        );

        // Guardar el carrito actualizado en la sesión
        $_SESSION['carro'] = $carro;
    }

    // Redireccionar de vuelta al catálogo
    header("Location: catalogo.php");
    exit();
} else {
    // Si no se proporcionó un ID, redireccionar al catálogo
    header("Location: catalogo.php");
    exit();
}
?>
