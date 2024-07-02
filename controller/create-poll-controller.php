<?php
require_once ("../config.php");

$user_id = $_SESSION['user_id'];
$title = $conn->real_escape_string($_POST['title']);
$description = $conn->real_escape_string($_POST['description']);
$category_id = (int) $_POST['category_id'];
$options = $_POST['options'];

$sql = "INSERT INTO polls (title, description, category_id, user_id) VALUES ('$title', '$description', $category_id, $user_id)";
$result = mysqli_query($conn, $sql);

if ($result) {
    $poll_id = mysqli_insert_id($conn);

    foreach ($options as $option) {
        $option = mysqli_real_escape_string($conn, $option);
        $sql = "INSERT INTO poll_options (title, poll_id) VALUES ('$option', $poll_id)";
        mysqli_query($conn, $sql);
    }

    $_SESSION['success'] = "Successfully created poll!";
    header("Location: ../pages/admin/index.php");
    die;
} else {
    $_SESSION['error'] = "Error creating poll!";
    header("Location: ../pages/create-poll/create-poll.php");
    die;
}
?>