<?php
require_once '../../../config.php';

if (!$_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['id'])) {
    $_SESSION['error'] = 'Invalid request.';
    header('Location: ../dashboard.php');
    die;
}

$poll_id = $_GET['id'];
$sql = "SELECT polls.id, polls.title, polls.description, users.username AS creator, categories.title AS category FROM polls
        JOIN users ON polls.user_id = users.id 
        JOIN categories ON polls.category_id = categories.id
        WHERE polls.id = '$poll_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    $_SESSION['error'] = 'Poll not found.';
    header('Location: ../dashboard.php');
    die;
}
$row = mysqli_fetch_assoc($result);
$options_sql = "SELECT * FROM poll_options WHERE poll_id = $poll_id";
$options_result = mysqli_query($conn, $options_sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polls</title>
    <link rel="stylesheet" href="../../../globals.scss">
    <script src="../../../public/js/main.js" ></script>
</head>

<body>
    <button onclick="goBack()">Go Back</button>
    <h1><?= $row['title'] ?></h1>
    <h3><?= $row['description'] ?></h3>
    <h5>Created by: <?= $row['creator'] ?></h5>
    <h5>Category: <?= $row['category'] ?></h5>
    <br />
    <form action="">
        <?php while ($options = mysqli_fetch_assoc($options_result)) {
            echo '<label for="option">' . $options['title'] . '</label>';
            echo '<input type="radio" name="option" value="' . $options['id'] . '">' . "<br>";
        } ?>
        <input type="submit" value="Submit">
    </form>
</body>

</html>