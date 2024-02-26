<?php
namespace Models;

use Config\Database;

class IssuePriority
{
    private $table = 'issue_priorities';
    private $id;
    private $active;
    private $priority_name;

    protected function getDbConnection() {
        return Database::getInstance()->getConnection();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getActive()
    {
        return $this->active;
    }
    public function getPriorityName()
    {
        return $this->priority_name;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setActive($active)
    {
        $this->active = $active;
    }
    public function setPriorityName($priority_name)
    {
        $this->priority_name = $priority_name;
    }
    
}