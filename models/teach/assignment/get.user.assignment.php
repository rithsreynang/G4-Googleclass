<?php
require_once "database/database.php";
function  allAssignmentForEnrollStudent($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT assignments.assignment_id,
    assignments.title, assignments.description, assignments.post_date,
    assignments.dateline, assignments.score, assignments.file, assignments.path_file
    FROM classroom_enroll INNER JOIN classroom ON classroom_enroll.classroom_id = classroom.classroom_id
    INNER JOIN assignments ON classroom.classroom_id = assignments.classroom_id 
    WHERE classroom_enroll.user_id = :id and classroom_enroll.role = 'student'");
    $statement->execute([":id" => $id]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}