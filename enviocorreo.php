<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

/* Sección de variables */
//Quien envía
$cuentaRemitente = 'correo@outlook.com';
$PassCuentaRemitente = 'Contraseña';
//Quien recibe
$cuentaDestinatario = "correo@loquesea.com";
//Que se envía
$Asunto = "Prueba";
$Mensaje = "Mensaje de prueba <br><img src='https://sadanduseless.b-cdn.net/wp-content/uploads/2022/03/cat-hands1.jpg'>"; //Aquí puede ir o no código HTML con o sin imágenes.
$MensajeAlterno = "Mensaje de prueba"; //Aquí solo debe ir texto.


$mail = new PHPMailer(true);

try {
    // Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.outlook.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = $cuentaRemitente;
    $mail->Password = $PassCuentaRemitente;


    $mail->setFrom($cuentaRemitente, 'Correo del sistema');
    $mail->addAddress($cuentaDestinatario, '');
    $mail->addReplyTo($cuentaRemitente, '');


    $mail->IsHTML(true);
    $mail->Subject = $Asunto;
    $mail->Body = $Mensaje;
    $mail->AltBody = $MensajeAlterno;

    $mail->send();
    echo "Mensaje enviado.";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
