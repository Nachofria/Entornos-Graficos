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
if (isset($_POST['email'], $_POST['contrasena'])) {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar las credenciales del usuario
    $consulta = "SELECT id, nombre, contrasena FROM usuarios WHERE email = '$email'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows == 1) {
        // Si se encontró un usuario con ese correo, verificar la contraseña
        $fila = $resultado->fetch_assoc();
        if (password_verify($contrasena, $fila['contrasena'])) {
            // Contraseña válida, iniciar sesión
            $_SESSION['id_usuario'] = $fila['id'];
            $_SESSION['nombre'] = $fila['nombre'];

            // Redirigir al usuario a una página de bienvenida o perfil
            header("Location: bienvenida.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario no encontrado";
    }
} else {
    // Si no se recibieron todos los datos del formulario, redirigir a una página de error
    header("Location: error.php");
    exit();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
