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

    // Observers
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

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getStatusId()
    {
        return $this->status_id;
    }
    public function getPriorityId()
    {
        return $this->priority_id;
    }
    public function getCreatorUserId()
    {
        return $this->creator_user_id;
    }
    public function getAssignedUserId()
    {
        return $this->assigned_user_id;
    }
    public function getProjectId()
    {
        return $this->project_id;
    }
    public function getActive()
    {
        return $this->active;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
    }
    public function setPriorityId($priority_id)
    {
        $this->priority_id = $priority_id;
    }
    public function setCreatorUserId($creator_user_id)
    {
        $this->creator_user_id = $creator_user_id;
    }
    public function setAssignedUserId($assigned_user_id)
    {
        $this->assigned_user_id = $assigned_user_id;
    }
    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
    }
    public function setActive($active)
    {
        $this->active = $active;
    }
    
}
