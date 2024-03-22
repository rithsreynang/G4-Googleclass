<?php
function createAccount($name, $email, $password): bool
{
    global $connection;
    $user = $connection->prepare("INSERT INTO users (username, email, password, profile) values (:name, :email, :password,:profile);");
    $user->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':profile' => 'user.png',
        
    ]);
    return $user->rowCount() > 0;
}

function  accountExist(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users where email =:email");
    $statement->execute([':email' => $email]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}