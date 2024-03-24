<?php
require_once "database/database.php";
function  getAllSubmits(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM submition ");
    $statement->execute([]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
};

function getAllAssignmentSumit(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT submition.submit_id, submition.submit_date, submition.file_path,
    assignments.assignment_id, assignments.description,assignments.title FROM submition INNER JOIN assignments
    ON assignments.assignment_id = submition.assignment_id;");
    $statement->execute([]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}
