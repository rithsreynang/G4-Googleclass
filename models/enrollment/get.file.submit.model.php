<?php
require_once "database/database.php";
function getFile($assignment_id, $user_id): array
{
    global $connection;
    $assignment = $connection->prepare("SELECT * FROM submition WHERE $assignment_id=:assignment_id and $user_id=:user_id");
    $assignment->execute([
        ":assignment_id" => $assignment_id,
        ":user_id" => $user_id,
    ]);
    if ($assignment->rowCount() > 0) {
        return $assignment->fetch();
    } else {
        return [];
    };
}