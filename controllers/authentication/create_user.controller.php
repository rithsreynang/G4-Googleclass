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
        if (strlen($password) > 8) {
            $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
            if (count($user) == 0) {
                createAccount($username, $email, $password_encrypt);
                header("Location: /home");
            } else {
                header("Location: /user-signup");
            }
        } else {
            header("Location:  /user-signup");
        }
    } else {
        header("Location:  /user-signup");
    }
}
