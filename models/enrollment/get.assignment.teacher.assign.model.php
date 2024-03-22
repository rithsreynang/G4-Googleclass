<?php

function getAllAssignmentAssign($assign): array
{
    global $connection;
    $statement = $connection->prepare("SELECT assignments.assignment_id, assignments.title
        FROM assignments INNER JOIN classroom ON assignments.classroom_id = classroom.classroom_id
        INNER JOIN classroom_enroll ON classroom.classroom_id = classroom_enroll.classroom_id
        INNER JOIN users ON classroom_enroll.user_id = users.user_id
        WHERE users.role = 'student'");
    $statement->execute([":assignment_id" => $assign]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}
