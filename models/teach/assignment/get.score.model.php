<?php
require_once "database/database.php";
function getScore($assign_id, $user_id):array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM score WHERE assignment_id=:assign_id and user_id=:user_id");
    $statement->execute([
        ":assign_id" => $assign_id,
        ":user_id" => $user_id
    ]);
    if ($statement->rowCount() > 0){
        return $statement->fetch();
    }else{
        return [];
    }
}

function assignScore($score, $assignment_id, $user_id): bool
{
    global $connection;
    
    $insertStatement = $connection->prepare("INSERT INTO score (score, assignment_id, user_id) 
    VALUES (:score, :assignment_id, :user_id)");
    $insertStatement->execute([
        ":score" => $score,
        ":assignment_id" => $assignment_id,
        ":user_id" => $user_id
    ]);
    
    return $insertStatement->rowCount() > 0;
}