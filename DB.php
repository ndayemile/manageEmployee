<?php

class DB {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "employee";

    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function executeQuery($sql) {
        return $this->conn->query($sql);
    }

    public function closeConnection() {
        $this->conn = null;
    }
}

?>
