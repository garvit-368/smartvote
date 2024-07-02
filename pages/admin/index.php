<?php require_once '../../config.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['first_name'] . "'s" ?> Admin Dashboard</title>
    <link rel="stylesheet" href="../../globals.scss">
</head>

<body>
    <?php require_once '../../includes/message.php' ?>
    <h1>Admin Dashboard</h1>
    <a href="../../controller/logout-controller.php">Logout</a>
    <ul style="list-style-type: disc;">
        <li><a href="poll/create-poll.php">Create Poll</a></li>
        <li><a href="../dashboard/dashboard.php">View Active Polls</a></li>
        <li><a href="../dashboard/poll/all-polls.php">View All Polls</a></li>
        <li><a href="">View Reports</a></li>
        <li><a href="users/manage-users.php">Manage Users</a></li>
    </ul>
</body>

</html>