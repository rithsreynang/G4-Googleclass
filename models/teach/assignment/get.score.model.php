<?php
require_once "database/database.php";
function getScore($assign_id):array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM score WHERE assignment_id=:assign_id");
    $statement->execute([
        ":assign_id" => $assign_id,
    ]);
    if ($statement->rowCount() > 0){
        return $statement->fetchAll();
    }else{
        return [];
    }
}