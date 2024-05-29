<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Configurar el correo electrónico
    $destinatario = 'webmaster@example.com'; // Cambiar a tu dirección de correo electrónico
    $asunto = 'Consulta de contacto';
    $cuerpoMensaje = "Nombre: $nombre\n";
    $cuerpoMensaje .= "Email: $email\n";
    $cuerpoMensaje .= "Mensaje:\n$mensaje";

    // Enviar el correo electrónico
    if (mail($destinatario, $asunto, $cuerpoMensaje)) {
        echo '<p>¡El mensaje se ha enviado correctamente!</p>';
    } else {
        echo '<p>Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.</p>';
    }
} else {
    // Redirigir si el formulario no se envía mediante POST
    header("Location: contacto.php");
    exit;
}
?>
