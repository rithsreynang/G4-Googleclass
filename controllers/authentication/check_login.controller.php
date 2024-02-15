<?php
    require "../../database/database.php";
    require "../../models/signin.model.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $users = checkUser($email, $password);
        
    }
?>

