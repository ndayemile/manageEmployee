<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body class="section">
    <div class="form-box">
        <h2 class="h2">Register</h2>
        <form method="post" action="index.php">
            Username: <input type="text" name="username" class="inputbox"><br>
            Password: <input type="password" name="password" class="inputbox"><br>
            Role: <br><select name="role" class="inputbox">
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
            </select><br><br>
            <input type="submit" name="register" value="Register" class="button">
        </form>
    </div>
</body>
</html>