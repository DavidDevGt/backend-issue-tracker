<?php
namespace Models;

use Config\Database;

class IssueStatus
{
    private $table = 'issue_status';
    private $id;
    private $active;
    private $status_name;

    protected function getDbConnection()
    {
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
    public function getStatusName()
    {
        return $this->status_name;
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
    public function setStatusName($status_name)
    {
        $this->status_name = $status_name;
    }

    public static function getAll()
    {}
}