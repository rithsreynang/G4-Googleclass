<?php
require_once("../../../database/database.php");
function turnInAssignment(int $assignment_id, int $user_id)
{
    date_default_timezone_set("Asia/Phnom_Penh");
    $submissionDate = date_create();
    $post_date = date_format($submissionDate, "M - d , H:i");
    global $connection;
    $query = "UPDATE submition SET submit_status='turnin' , submit_date=:post_date where assignment_id=:assignment_id and user_id=:user_id";
    $assignment = $connection->prepare($query);
    $assignment->execute([
        ":post_date" => $post_date,
        ":assignment_id" => $assignment_id,
        ":user_id" => $user_id
    ]);
}

