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
    <h2>Welcome, Employee!</h2>
    <a href="index.php?logout" class="alink">Logout</a>
    <?php
    require_once 'Employee.php';
    $employee = new Employee();
    ?>
<h3 class="h2">Employee List</h3>
        <table class="table">
            <tr class="th">
                <th class="th">ID</th>
                <th class="th">Username</th>
                <th class="th">Role</th>
            </tr>
            <?php
            $employees = $employee->getEmployees();
            if (!empty($employees)) {
                foreach ($employees as $row) {
                    ?>
                    <tr class="tr">
                        <td class="tr"><?php echo $row['ID']; ?></td>
                        <td class="tr"><?php echo $row['Username']; ?></td>
                        <td class="tr"><?php echo $row['Role']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">No employees found.</td>
                </tr>
                <?php
            }
            ?>
        </table>
</body>
</html>