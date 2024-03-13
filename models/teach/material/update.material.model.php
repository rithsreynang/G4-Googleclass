<?php

require_once "../../../database/database.php";

function updateMaterial($material_id, $title, $description, $file): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE materials SET title = :title, description = :description, file = :file WHERE material_id = :material_id");
    $statement->execute([
        ":material_id" => $material_id,
        ":title" => $title,
        ":description" => $description,
        ":file" => $file
    ]);
    return $statement->rowCount() > 0;
}
?>
