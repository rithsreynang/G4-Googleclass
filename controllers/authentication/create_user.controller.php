<?php
    session_start();
    require "../../models/signup.model.php";
    require "../../database/database.php";
    $statement = $connection->prepare("select * from users");
    $statement->execute();
    $emails = $statement->fetchAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){        
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $signupAlready = false;
            foreach($emails as $mail){
                if ($mail['email'] == $email){
                    $signupAlready = true;
                    echo "<script>alert('Email have already use!')</script>";
                    header("Location: /user-signup");
                };
            }
            if (!$signupAlready){
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                createUser($username, $email, $password_hash);
                echo "<script>alert('Create Successful!!!')</script>";
            }
            else{
                echo"<script>alert('Emails have already use!!!')</script>";
            }
        }
        else{
            echo "<script>alert('Missing!!')</script>";
            header("Location:  /user-signup");
        }
    }
?>