<?php
require_once "../../../database/database.php";
function createAssignment($title, $post_date, $classroom_id, $dateline, $description, $file_path, $user_id, $limit_score, $path_name)
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO assignments (title, description, user_id, post_date, file, score, classroom_id, dateline, path_file)
    values(:title, :description, :user_id, :post_date, :file,:score, :classroom_id, :dateline, :path_file)");
    $statement->execute([
        ":title" => $title,
        ":description" => $description,
        ":user_id" => $user_id,
        ":post_date" => $post_date,
        ":file" => $path_name,
        ":score" => $limit_score,
        ":classroom_id" => $classroom_id,
        ":dateline" => $dateline,
        ":path_file" => $file_path,
    ]);
}

