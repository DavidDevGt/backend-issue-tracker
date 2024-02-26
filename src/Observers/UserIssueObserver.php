<?php

namespace Observers;

use Models\Issue;
use Mail\Mailer;

class UserIssueObserver implements IssueObserverInterface {
    private $mailer;

    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function update($issue) {
        if ($issue->getStatusId() == 5) { // Status ID = "Resuelto" o similar
            $assignedUser = $issue->getAssignedUser();
            $creatorUser = $issue->getCreatorUser();

            // Prepara los datos para el correo electrónico
            $subject = "Incidencia Resuelta: {$issue->getTitle()}";
            $template = 'issueResolved.php'; // Asume que tienes una plantilla para este tipo de correo
            $data = ['issue' => $issue]; // Datos que pasarás a la plantilla

            // Envía el correo electrónico al usuario asignado y al creador
            $this->mailer->sendTemplateEmail($assignedUser->getEmail(), $subject, $template, $data);
            $this->mailer->sendTemplateEmail($creatorUser->getEmail(), $subject, $template, $data);
        }
    }
}
