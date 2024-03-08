<?php
require_once "../../database/database.php";

function deleteAssignment($assignment_id): void
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM assignments WHERE assignment_id = :id");
    $statement->execute([
        ":id" => $assignment_id
    ]);
}