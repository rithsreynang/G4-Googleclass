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
            $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
            $user = accountExist($email);
            if (count($user) == 0){
                createAccount($username, $email, $password_encrypt);
                header("Location: /home");
                $_SESSION['success'] = "Account Created successfully";
            }else{
                echo "Account already exists";
            }
        }
        else{
            echo "<script>alert('Missing!!')</script>";
            header("Location:  /user-signup");
        }
    }
?>