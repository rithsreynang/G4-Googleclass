<?php
require_once "../../database/database.php";

function listStudents($classroom_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT classroom_enroll.class_enroll_id, users.user_id, users.username, users.email, users.profile from classroom_enroll inner JOIN users ON users.user_id = classroom_enroll.user_id where classroom_id =:id and role='student'");
    $statement->execute([
        ":id" => $classroom_id
    ]);

    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    }
    return [];
}
