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
}
