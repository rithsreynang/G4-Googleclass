<?php

require_once "../../../database/database.php";

function updateAssignment($id, $title, $description, $file_name, $score, $dateline): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE assignments SET title =:title, description =:description, file =:file_name, score =:score, dateline =:dateline WHERE assignment_id =:id");
    $statement->execute([
        ":id" => $id,
        ":title" => $title,
        ":description" => $description,
        ":file_name" => $file_name,
        ":score" => $score,
        ":dateline" => $dateline
    ]);
    return $statement->rowCount() > 0;
}
?>