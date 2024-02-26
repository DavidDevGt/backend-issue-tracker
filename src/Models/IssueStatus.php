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
}