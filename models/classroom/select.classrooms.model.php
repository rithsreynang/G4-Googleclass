<?php
function getClassroomsUnarchive($user_id):array
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom  WHERE user_id=:user_id and status='unarchive';");
    $classroom->execute([':user_id' => $user_id]);
    if ($classroom->rowCount() > 0){
        return $classroom->fetchAll();
    }
    else{
        return [];
    };
}
function getClassroomsArchive($user_id):array
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom  WHERE user_id=:user_id and status='archive';");
    $classroom->execute([':user_id' => $user_id]);
    if ($classroom->rowCount() > 0){
        return $classroom->fetchAll();
    }
    else{
        return [];
    };
}
?>