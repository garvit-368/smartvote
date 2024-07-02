<?php
require_once ("../../../config.php");
$sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.username, r.role
FROM users u
JOIN roles r ON u.role = r.id;
";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../../../globals.scss">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once ("../../../includes/message.php"); ?>
    <a href="../">Go back</a>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['first_name'] . '</td>
                <td>' . $row['last_name'] . '</td>
                <td>' . $row['username'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['role'] . '</td>
                <td>
                <a href="edit-user.php?id=' . $row['id'] . '">Edit</a>
                <a href="delete-user.php?id=' . $row['id'] . '">Delete</a>
                </td>
                </tr>';
            }
            ?>
        </tbody>
    </table>

</body>

</html>