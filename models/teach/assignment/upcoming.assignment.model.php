<?php
require_once "database/database.php";
function  getUpcoming($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM assignments WHERE classroom_id=:id order by assignment_id desc");
    $statement->execute([":id" => $id]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}