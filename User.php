<?php

class User extends DB {
    private $table = "employee";

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE Username=:username AND Password=:password");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['ID'] = $result['ID'];
            $_SESSION['Role'] = $result['Role'];
            return true;
        } else {
            return false;
        }
    }

    public function register($username, $password, $role) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (Username, Password, Role) VALUES (:username, :password, :role)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);
        return $stmt->execute();
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['ID']);
    }

    public function getRole() {
        return $_SESSION['Role'];
    }
}

?>
