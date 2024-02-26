<?php

namespace Models;

use Config\Database;
use Observers\IssueObserverInterface;

class Issue
{
    private $table = 'issues';
    private $id;
    private $title;
    private $description;
    private $status_id;
    private $priority_id;
    private $creator_user_id;
    private $assigned_user_id;
    private $project_id;
    private $active;
    private $created_at;
    private $updated_at;

    private $observers = [];

    public function attach(IssueObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(IssueObserverInterface $observer)
    {
        foreach ($this->observers as $key => $obs) {
            if ($observer === $obs) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
