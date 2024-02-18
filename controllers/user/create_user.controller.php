<?php
session_start();
require "../../models/signup.model.php";
require "../../database/database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $user = accountExist($email);
        $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
        if (count($user) == 0) {
            createAccount($username, $email, $password_encrypt);
            $_SESSION['success'] = "Account successfully created";
            exit;
            header("Location: /home");
        } else {
            $_SESSION['error'] = "Email already used";
            echo "<script>alert('Email already use. Please Create again!!!'); window.location.href='/user-signup'</script>";
            exit;
        }
    } else {
        echo "<script>alert('Require all data from your input!!!'); window.location.href='/user-signup'</script>";
        exit;
    }
}