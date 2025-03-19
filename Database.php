<?php

class Database {
    private static $instance = null; // Singleton instance
    private $connection; // PDO connection

    private $host = DB_HOST;
    private $dbName = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;

    // Private constructor to prevent direct object creation
    private function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    // Get the singleton instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Get the PDO connection
    public function getConnection() {
        return $this->connection;
    }

    // Prevent object cloning
    private function __clone() {}

    // Prevent object unserialization
    public  function __wakeup() {}
}
