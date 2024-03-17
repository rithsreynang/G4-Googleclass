<?php
require_once "../../../../database/database.php";
function updateAssignment($id, $title, $description, $path_file, $score, $dateline, $file_name): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE assignments SET title =:title, description =:description, file =:file_name, score =:score, dateline =:dateline, path_file=:path_file WHERE assignment_id =:id");
    $statement->execute([
        ":id" => $id,
        ":title" => $title,
        ":description" => $description,
        ":file_name" => $file_name,
        ":score" => $score,
        ":dateline" => $dateline,
        ":path_file" => $path_file
    ]);
    return $statement->rowCount() > 0;
}
?>