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
}