<?php
require_once "../../database/database.php";
function  getAllAssignment($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM assignments WHERE classroom_id=:id");
    $statement->execute([":id" => $id]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}


