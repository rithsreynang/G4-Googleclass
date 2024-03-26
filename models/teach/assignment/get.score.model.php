<?php
require_once "database/database.php";
function getScore($assign_id, $user_id):array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM score WHERE assignment_id=:assign_id and user_id=:user_id");
    $statement->execute([
        ":assign_id" => $assign_id,
        ":user_id" => $user_id
    ]);
    if ($statement->rowCount() > 0){
        return $statement->fetch();
    }else{
        return [];
    }
}

function gradeStudent($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT score.score, assignments.assignment_id, assignments.title,
    users.profile, users.user_id, users.username, classroom.classroom_id
    FROM score
    INNER JOIN assignments ON score.assignment_id = assignments.assignment_id
    INNER JOIN users ON score.user_id = users.user_id
    INNER JOIN classroom_enroll ON users.user_id = classroom_enroll.user_id
    INNER JOIN classroom ON classroom_enroll.classroom_id = classroom.classroom_id
    WHERE classroom.classroom_id = :id;");
    $statement->execute([":id" => $id]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
};


