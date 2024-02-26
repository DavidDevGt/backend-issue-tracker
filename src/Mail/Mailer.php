<?php

namespace Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function sendTemplateEmail($to, $subject, $templatePath, $data)
    {
        ob_start();
        include $templatePath;
        $body = ob_get_clean();

        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Especifica tus servidores SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'user@example.com'; // SMTP username
            $mail->Password = 'secret'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Habilita encriptación TLS, `ssl` también es aceptada
            $mail->Port = 587; // Puerto TCP para conectarse a

            // Destinatarios
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($to); // Añade un destinatario

            // Contenido
            $mail->isHTML(true); // Configura el formato de email a HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            echo 'El mensaje ha sido enviado';
        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
