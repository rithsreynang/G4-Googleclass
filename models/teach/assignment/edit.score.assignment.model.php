<?php
require_once "../../../../database/database.php";
function editScore($assignment_id, $user_id,$score): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO score (score, assignment_id, user_id)
    values(:score, :assignment_id, :user_id)");
    $statement->execute([
        ":score" => $score,
        ":assignment_id" => $assignment_id,
        ":user_id" => $user_id
    ]);
    return $statement->rowCount() > 0;
}