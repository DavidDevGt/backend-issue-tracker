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
}