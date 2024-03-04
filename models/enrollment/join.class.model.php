<?php
function  enrollClass($user_id, $classroom_id)
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO classroom_enroll (user_id, role, classroom_id) values(:user_id, :role, :classroom_id)");
    $statement->execute([
        ":user_id" => $user_id,
        ":role" => "student",
        ":classroom_id" => $classroom_id
    ]);
}
function  classExit($user_id, $class_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM classroom_enroll where classroom_id = :classroom_id and user_id=:user_id");
    $statement->execute([
        ':classroom_id' => $class_id,
        ':user_id' => $user_id
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}
