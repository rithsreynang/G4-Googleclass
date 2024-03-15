<?php
require_once "../../../database/database.php";
function getMaterial($classroom_id, $material_id):array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM materials WHERE material_id=:material_id and classroom_id=:classroom_id");
    $statement->execute([
        ":material_id" => $material_id,
        ":classroom_id" => $classroom_id
    ]);
    if ($statement->rowCount() > 0){
        return $statement->fetch();
    }else{
        return [];
    }
}