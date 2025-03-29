<?php
$to = "tuemail@ejemplo.com";
$subject = "Correo de prueba desde PHP";
$message = "¡Este es un test!";
$headers = "From: foro@localhost";

if (mail($to, $subject, $message, $headers)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}
?>
