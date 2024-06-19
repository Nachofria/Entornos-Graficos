<?php
session_start();

$host = 'localhost';    // Cambiar si es necesario
$usuario = 'root';      // Cambiar si es necesario
$contrasena = '';       // Cambiar si es necesario
$base_datos = 'base2';  // Nombre de la base de datos

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
if (isset($_POST['nombre'], $_POST['email'], $_POST['contrasena'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);  // Encriptar la contraseña

    // Consulta SQL para insertar el nuevo usuario
    $consulta = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";

    if ($conexion->query($consulta) === TRUE) {
        // Registro exitoso, redirigir al usuario a una página de bienvenida o login
        header("Location: login.php");
        exit();
    } else {
        // Error en la consulta SQL
        echo "Error al registrar usuario: " . $conexion->error;
    }
} else {
    // Si no se recibieron todos los datos del formulario, redirigir a una página de error
    header("Location: error.php");
    exit();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
