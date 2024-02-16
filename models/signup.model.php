<?php

function createUser($name, $email, $password): bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (username, email, password) values (:name, :email, :password);");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
    ]);
    return $statement->rowCount() > 0;
}
