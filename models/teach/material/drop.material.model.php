<?php
require_once "../../../database/database.php";
function createMaterial(string $file,string $discription, string $title, string $postDate, int $classroom_id):bool
{
    // $fileDestination, $discription, $title, $postDate, $classroom_id
    global $connection;
    $material = $connection->prepare("INSERT INTO materials(title, description, date_post, file, classroom_id)  values(:title, :discription, :date_post, :file, :classroom_id);");
    $material->execute([
        ':title' => $title,
        ':discription' => $discription,
        ':date_post' => $postDate,
        ':file' => $file,
        ':classroom_id' => $classroom_id,
    ]);
    return $material->rowCount() > 0;
};  

