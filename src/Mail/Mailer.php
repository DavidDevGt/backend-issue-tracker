<?php

namespace Mail;

class Mailer
{
    public function sendTemplateEmail($to, $subject, $templatePath, $data)
    {
        ob_start();
        include $templatePath;
        $body = ob_get_clean();

        // Luego, enviar el correo con la librería de tu elección (PHPMailer, SwiftMailer, etc.)
    }
}
