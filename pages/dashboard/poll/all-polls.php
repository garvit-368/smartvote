<?php
require_once '../../../config.php';
$sql = "SELECT polls.id, polls.title AS title, polls.description, users.username AS creator, categories.title AS category FROM polls 
        JOIN users ON polls.user_id = users.id 
        JOIN categories ON polls.category_id = categories.id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['first_name'] . "'s" ?> Dashboard</title>
    <link rel="stylesheet" href="../../../globals.scss">
</head>

<body>
    <?php require_once '../../../includes/message.php' ?>
    <h1>All polls</h1>
    <h2>Welcome, <?= $_SESSION['username'] ?></h2>
    <span><a href="../../../controller/logout-controller.php">Logout</a></span>
    <span>
        <?php
        if ($_SESSION['role'] == 2) {
            echo '<a href="../../admin">Back to admin dashboard</a>';
        }
        ?>
    </span>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='poll'>";
            echo "<h1><a href='poll-detail.php?id=" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['title']) . "</a></h1>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p>Created by: " . htmlspecialchars($row['creator']) . "</p>";
            echo "<p>Category: " . htmlspecialchars($row['category']) . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>You have no polls</p>";
    }
    ?>
</body>

</html>