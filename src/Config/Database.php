<?php
namespace Config;

use mysqli;

class Database
{
    private static $instance = null;
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASS'],
            $_ENV['DB_NAME']
        );

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    private function __clone() {}
    private function __wakeup() {}
}