<?php
require_once "../../../../database/database.php";
function updateMaterial($material_id, $title, $description): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE materials SET title = :title, description = :description WHERE material_id = :material_id");
    $statement->execute([
        ":material_id" => $material_id,
        ":title" => $title,
        ":description" => $description,
       
    ]);
    return $statement->rowCount() > 0;
}
?>