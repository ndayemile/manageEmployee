<?php
require_once 'DB.php';
class Employee extends DB {
    private $table = "employee";

    public function addEmployee($username, $password, $role) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (Username, Password, Role) VALUES (:username, :password, :role)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);
        return $stmt->execute();
    }

    public function getEmployees() {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteEmployee($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE ID=:id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}

?>
