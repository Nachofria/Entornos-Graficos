<?php
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Verificar si existe el carrito en la sesión
    if (isset($_SESSION['carro']) && !empty($_SESSION['carro'])) {
        $carro = $_SESSION['carro'];

        // Eliminar el producto del carrito usando el ID como índice
        unset($carro[$id]);

        // Actualizar el carrito en la sesión
        $_SESSION['carro'] = $carro;
    }
}

// Redireccionar de vuelta al carrito
header("Location: vercarrito.php");
exit();
?>
