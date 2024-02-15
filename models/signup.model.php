<?php

function createUser($name, $email, $password){
    global $connection;
    $statement = $connection->prepare("insert into users (username, email, password) values (:name, :email, :password);");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
    ]);
}

?>