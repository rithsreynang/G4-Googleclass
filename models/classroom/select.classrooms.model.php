<?php
function getClassrooms($user_id):array
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom  WHERE user_id=:user_id");
    $classroom->execute([':user_id' => $user_id]);
    if ($classroom->rowCount() > 0){
        return $classroom->fetchAll();
    }
    else{
        return [];
    };
}
?>