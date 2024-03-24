<?php
require_once "database/database.php";
function getAllUserEnroller($classroom_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM assignments INNER JOIN classroom_enroll on assignments.classroom_id = classroom_enroll.classroom_id WHERE assignments.classroom_id = :classroom_id and classroom_enroll.role ='student';");
    $statement->execute([":classroom_id" => $classroom_id]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}

function getAllstudentEnrollerAssign($classroom_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT classroom_enroll.class_enroll_id,
    users.user_id, users.username, users.email, users.profile from classroom_enroll
    inner JOIN users ON users.user_id = classroom_enroll.user_id
    INNER JOIN score on classroom_enroll.user_id != score.user_id 
    where classroom_id =:id and role='student'");
    $statement->execute([
        ":id" => $classroom_id
    ]);

    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    }
    return [];
}

function getStudentEditScore($classroom_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT classroom_enroll.class_enroll_id,
    users.user_id, users.username, users.email, users.profile from classroom_enroll
    inner JOIN users ON users.user_id = classroom_enroll.user_id
    INNER JOIN score on classroom_enroll.user_id = score.user_id 
    where classroom_id =:id and role='student';");
    $statement->execute([
        ":id" => $classroom_id
    ]);

    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    }
    return [];
}
