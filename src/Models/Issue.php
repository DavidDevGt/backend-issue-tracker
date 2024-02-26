<?php

namespace Models;

use Config\Database;
use Observers\IssueObserverInterface;

class Issue
{
    private $observers = [];

    public function attach(IssueObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(IssueObserverInterface $observer)
    {
        // Lógica para remover un observador de la lista
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
