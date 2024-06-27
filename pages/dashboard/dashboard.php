<?php require_once '../../config.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['first_name'] . "'s" ?> Dashboard</title>
    <link rel="stylesheet" href="../../globals.scss">
</head>

<body>
    <?php require_once '../../includes/message.php' ?>
    <h1>Dashboard</h1>
    <a href="../../controller/logout-controller.php">Logout</a>
</body>

</html>