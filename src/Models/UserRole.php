<?php

namespace Models;

use Config\Database;

class UserRole
{
    private $table = 'user_roles';
    private $id;
    private $active;
    private $role_name;

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
    public function getRoleName()
    {
        return $this->role_name;
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
    public function setRoleName($role_name)
    {
        $this->role_name = $role_name;
    }
    
}
