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
    <title>Register</title>
    <link rel="stylesheet" href="../../globals.scss">
</head>

<body>
    <?php require_once '../../includes/message.php' ?>
    <h1>Register</h1>
    <form method="post" action="../../controller/register-controller.php">
        <span>
            <div>
                <label for="">First name:</label>
                <input placeholder="Enter your first name" name="firstname" type="text">
            </div>
            <div>
                <label for="">Last name:</label>
                <input placeholder="Enter your last name" name="lastname" type="text">
            </div>
        </span>
        <span>
            <div>
                <label for="">Email:</label>
                <input placeholder="Enter your email" name="email" type="email">
            </div>
            <div>
                <label for="">Username:</label>
                <input placeholder="Enter your username" name="username" type="text">
            </div>
        </span>
        <span>
            <div>
                <label for="">Password:</label>
                <input placeholder="Enter your password" name="password" type="password">
            </div>
            <div>
                <label for="">Repeat password:</label>
                <input placeholder="Please repeat your password" name="password2" type="password">
            </div>
        </span>
        <input id="submit-btn" type="submit" value="Submit">
        <div>
            <p>Already have an account? <a href="./login.php">Login</a></p>
            <p><a href="admin_register.php">Register as admin</a></p>
        </div>
    </form>
</body>

</html>