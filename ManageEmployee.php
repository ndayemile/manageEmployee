<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <center><a href="index.php?logout" class="alink">Logout</a>
    <a href="viewEmployee.php" class="alink">View Employees</a>
</head>
<br>
<br>
<br>
<body class="section2">
    <div class="form-box">
        <h3 class="h2">Add Employee</h3>
        <form method="post" action="index.php">
            Username: <input type="text" name="username" class="inputbox"><br>
            Password: <input type="password" name="password" class="inputbox"><br>
            Role: <br><select name="role" class="inputbox">
                <option value="employee">Employee</option>
            </select><br><br>
            <input type="submit" name="add_employee" value="Add Employee" class="button">
        </form>
 </div>
 </center>
</body>
</html>