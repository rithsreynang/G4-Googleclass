<?php
function createClassroom($name, $email, $password): bool
{
    global $connection;
    $user = $connection->prepare("INSERT INTO classroom (username, email, password) values (:name, :email, :password);");
    $user->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password
    ]);
    return $user->rowCount() > 0;
}

function  classroomExist(string $email): array
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