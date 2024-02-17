<?php
session_start();
require "../../database/database.php";
require "../../models/signup.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = accountExist($email);
    if (count($user) > 0) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['success'] = "Login successful";
            $_SESSION['user'] = [$user['id'], $user['name'], $user['email'], $user['password']];
            header("Location: /home");
            exit;
        } else {
            $_SESSION['error'] = "Wrong Email";
            echo "<script>alert('Wrong Password!!!'); window.location.href='/user-signin'</script>";
            exit;
        }
    } else {
        echo "<script>alert('Email do not match with account'); window.location.href='/user-signin'</script>";
        exit;
    }
}