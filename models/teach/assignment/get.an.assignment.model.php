<?php
require_once "../../database/database.php";
function getAssignment($class_id, $assign_id):array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM assignments WHERE assignment_id=:assign_id and classroom_id=:class_id");
    $statement->execute([
        ":assign_id" => $assign_id,
        ":class_id" => $class_id
    ]);
    if ($statement->rowCount() > 0){
        return $statement->fetch();
    }else{
        return [];
    }
}