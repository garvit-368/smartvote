<?php require_once '../../config.php';
if (isset($_SESSION['user_id'])) {
    header('Location: ../dashboard/dashboard.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../globals.scss">
</head>


<body>
    <?php require_once '../../includes/message.php' ?>
    <h1>Login</h1>
    <form method="post" action="../../controller/login-controller.php">
        <label for="">Username:</label>
        <input name="username" type="text">
        <label for="">Password:</label>
        <input name="password" type="password">
        <input id="submit-btn" type="submit" value="Submit">
    </form>
    <div>
        <p>Don't have an account? <a href="./register.php">Register</a></p>
    </div>
</body>

</html>