<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $entered_password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($entered_password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['full_name'] = $row['first_name'] . ' ' . $row['last_name'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['success'] = 'Logged in successfully';
        $_SESSION['role'] = $row['role'];
        if ($row['role'] == 1) {
            header('Location: ../pages/dashboard/dashboard.php');
            die;
        } else if ($row['role'] == 2) {
            header('Location: ../pages/admin/');
            die;
        }
    } else {
        $_SESSION['error'] = 'Invalid username or password';
        header('Location: ../pages/auth/login.php');
        die;
    }
}