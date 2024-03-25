<?php
require_once "../../../../database/database.php";
function insertScore($assign_id, $user_id, $score)
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO score (assignment_id, user_id, score) values(:assign_id, :user_id, :score) ");
    $statement->execute([
        ":assign_id" => $assign_id,
        ":user_id" => $user_id,
        ":score" => $score
    ]);
    $statement->rowCount() > 0;
}
?>