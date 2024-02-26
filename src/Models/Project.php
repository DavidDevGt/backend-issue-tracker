<?php
namespace Models;

use Config\Database;

class Project
{
    private $table = 'projects';
    private $id;
    private $project_name;
    private $description;
    private $active;
    private $created_at;
    private $updated_at;

    protected function getDbConnection() {
        return Database::getInstance()->getConnection();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getProjectName()
    {
        return $this->project_name;
    }
    public function getDescription()
    {
        return $this->description;
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
    public function setProjectName($project_name)
    {
        $this->project_name = $project_name;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setActive($active)
    {
        $this->active = $active;
    }
    
}