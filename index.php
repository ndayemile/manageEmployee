<?php

session_start();

require_once 'DB.php';
require_once 'User.php';
require_once 'Employee.php';
require_once 'Report.php';

$user = new User();
$employee = new Employee();
$report = new Report();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->login($username, $password)) {
        // Redirect to appropriate page based on role
        if ($user->getRole() == 'admin') {
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($user->register($username, $password, $role)) {
        echo "Registration successful.";
    } else {
        echo "Registration failed.";
    }
}

if (isset($_POST['add_employee'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($employee->addEmployee($username, $password, $role)) {
        echo "Employee added successfully.";
        header("Location: viewEmployee.php");
    } else {
        echo "Failed to add employee.";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    if ($employee->deleteEmployee($id)) {
        echo "Employee deleted successfully.";
        header("Location: viewEmployee.php");
    } else {
        echo "Failed to delete employee.";
    }
}

if (isset($_GET['logout'])) {
    $user->logout();
    header("Location: index.php");
    exit();
}

if (!$user->isLoggedIn()) {
    // Show login form
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body class="section">
        <div class="form-box">
            <h2 class="h2">Login</h2>
            <form method="post" action="index.php">
                Username: <input type="text" name="username" class="inputbox"><br>
                Password: <input type="password" name="password" class="inputbox"><br><br>
                <input type="submit" name="login" value="Login" class="button">
            </form>
            <br>
            <a href="Register.php" class="forget">Register</a>
        </div>
    </body>
    </html>
    <?php
} else {
    // Show appropriate page based on role
    if ($user->getRole() == 'admin') {
        // Admin page
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" type="text/css" href="style.css" />
        </head>
        <body class="section2">
            <div class="goleft">
                <a href="index.php?logout" class="alink">Logout</a>
                <a href="ManageEmployee.php" class="alink">Manage Employees</a>
            </div>
            <h2 class="weladmin">Welcome, Admin!</h2>
        </body>
        </html>
        <?php
    } else {
        // Employee page
        header("Location: employeepage.php");
    }
}

?>
