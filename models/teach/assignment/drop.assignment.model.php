<?php
require_once "../../../database/database.php";
function createAssignment($title, $post_date, $classroom_id, $dateline, $description, $file_name, $user_id, $limit_score)
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO assignments (title, description, user_id, post_date, file, score, classroom_id, dateline)
    values(:title, :description, :user_id, :post_date, :file,:score, :classroom_id, :dateline)");
    $statement->execute([
        ":title" => $title,
        ":description" => $description,
        ":user_id" => $user_id,
        ":post_date" => $post_date,
        ":file" => $file_name,
        ":score" => $limit_score,
        ":classroom_id" => $classroom_id,
        ":dateline" => $dateline,
    ]);
}

