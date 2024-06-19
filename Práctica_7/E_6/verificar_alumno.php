<?php
session_start();

$host = 'localhost';  // Puede variar si tu base de datos está en otro servidor
$usuario = 'root';     // Usuario de la base de datos (en este caso, root)
$contrasena = '';      // Contraseña de la base de datos (en este caso, no hay contraseña)
$base_datos = 'base2'; // Nombre de la base de datos que has creado

// Establecer conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar si hubo errores en la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el correo electrónico enviado desde el formulario
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Consulta SQL para verificar si el correo existe en la tabla alumnos
    $consulta = "SELECT nombre FROM alumnos WHERE mail = '$email'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        // Si se encontró el correo en la base de datos, almacenar el nombre en la sesión
        $fila = $resultado->fetch_assoc();
        $_SESSION['nombre'] = $fila['nombre'];

        // Redirigir a la página de bienvenida
        header("Location: bienvenida.php");
        exit();
    } else {
        // Si no se encontró el correo, redirigir a una página de error
        header("Location: error.php");
        exit();
    }
} else {
    // Si no se recibió un correo electrónico, redirigir a una página de error
    header("Location: error.php");
    exit();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
