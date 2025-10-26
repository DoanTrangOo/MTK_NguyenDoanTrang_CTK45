<?php

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $dbHost = getenv('DB_HOST') ?: 'localhost';
        $dbName = getenv('DB_NAME') ?: 'dalala';
        $dbUser = getenv('DB_USER') ?: 'root';
        $dbPass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';

        $dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";

        try {
            $this->connection = new PDO($dsn, $dbUser, $dbPass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            // Log error and throw a generic message for production
            error_log("Database connection failed: " . $e->getMessage());
            throw new Exception("Database connection failed. Please try again later.");
        }
    }

    // Prevent cloning of the instance
    private function __clone() { }

    // Prevent unserializing of the instance
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    // Helper method for prepared statements
    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }

    // Helper method for queries
    public function query($sql) {
        return $this->connection->query($sql);
    }
}