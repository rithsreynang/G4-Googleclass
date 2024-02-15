<?php

function checkUser($email, $password){
    global $connection;
    $statement = $connection->prepare("select * from users");
    $statement->execute();
    $users = $statement->fetchAll();
    $isCreated = false;
    foreach($users as $user){
        echo $user['password'];
        // if($user['email'] == $email && password_verify($password, $user['password'])){
        //     $isCreated = true;
        //     echo $user['email'];
        //     echo $user['password'];
        //     echo $password;
        // };
    }
    
}

?>