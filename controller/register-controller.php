<?php

require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['email']) || !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['password2'])) {
        die('Please fill in all fields');
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if (isset($_POST['role'])) {
        $role = $_POST['role'];
    }


    if ($password != $password2) {
        $_SESSION['error'] = 'Passwords do not match';
        header('Location: ../pages/auth/register.php');
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if (!isset($role)) {
            $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$hashed_password')";
        } else if (isset($role) && $role == '2') {
            $query = "INSERT INTO users (first_name, last_name, email, username, password, role) VALUES ('$firstname', '$lastname', '$email', '$username', '$hashed_password', '$role')";
        }
        $result = mysqli_query($conn, $query);
        if ($result && isset($role) && $role == '2') {
            $_SESSION['success'] = 'Successfully created admin';
            header('Location: ../pages/auth/login.php');
            die;
        } else if ($result) {
            $_SESSION['success'] = 'Successfully created user';
            header('Location: ../pages/auth/login.php');
        } else {
            $_SESSION['error'] = 'An error occurred, please try again';
            header('Location: ../pages/auth/register.php');
        }
    }
}