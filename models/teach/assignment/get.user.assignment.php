<?php
require_once "database/database.php";
function allAssignmentForEnrollStudent($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT assignments.assignment_id, assignments.title, assignments.dateline, 
    assignments.description, assignments.file, assignments.path_file, submition.submit_status
    FROM assignments
    INNER JOIN classroom ON assignments.classroom_id = classroom.classroom_id
    INNER JOIN classroom_enroll ON classroom.classroom_id = classroom_enroll.classroom_id
    INNER JOIN users ON classroom_enroll.user_id = users.user_id
    LEFT JOIN submition ON submition.assignment_id = assignments.assignment_id AND submition.user_id = users.user_id
    WHERE classroom_enroll.user_id = :id and classroom_enroll.role = 'student' AND (submition.submit_status IS NULL OR submition.submit_status = 0)");
    $statement->execute([":id" => $id]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}