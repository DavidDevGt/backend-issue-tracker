<?php

namespace Models;

use Config\Database;
use Helpers\EncryptData;

class User
{
    private $table = 'users';
    private $id;
    private $username;
    private $email;
    private $password;
    private $role_id;
    private $active;
    private $created_at;
    private $updated_at;

    // setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = EncryptData::encryptPassword($password);
    }
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }
    public function setActive($active)
    {
        $this->active = $active;
    }

    // getters
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    // Let's not return the password
    public function getRoleId()
    {
        return $this->role_id;
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

    // verify password
    public function verifyPassword($inputPassword)
    {
        return EncryptData::verifyPassword($inputPassword, $this->password);
    }

    protected function getDbConnection() {
        return Database::getInstance()->getConnection();
    }
}
