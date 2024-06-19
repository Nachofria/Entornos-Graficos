<?php
// Borrar la cookie estableciendo su expiración en el pasado
setcookie('tipoNoticia', '', time() - 3600, "/"); // Cookie expirada

// Redirigir de vuelta al inicio después de borrar la cookie
header("Location: index.php");
exit();
?>
