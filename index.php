<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="globals.scss">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php require_once 'includes/message.php' ?>
    <h1>SmartVote</h1>
    <h5>A Smart way to Vote</h5>
    <div>
        <a href="./pages/auth/login.php">Login</a>
        <a href="./pages/auth/register.php">Register</a>
    </div>
</body>

</html>