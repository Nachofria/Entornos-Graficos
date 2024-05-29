<?php

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["amigo_email"] = $_POST["email"];

        header("Location: confirmacion.php");
        exit;
    }
?>
