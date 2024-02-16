<?php
    require "../../database/database.php";
    $statement = $connection->prepare("select * from users");
    $statement->execute();
    $users = $statement->fetchAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $email. $password;
        foreach ($users as $value){
            if ($value['email'] == $email && password_verify($password, $value['password'] )){
                echo "successful";
            };
        }
    }
?>

