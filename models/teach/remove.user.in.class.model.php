<?php
    require_once "../../database/database.php";
    function removeUser($user_id, $classroom_id){
        global $connection;
        $statement = $connection->prepare("DELETE FROM classroom_enroll where user_id=:user_id and classroom_id=:classroom_id");
        $statement->execute([
            ":user_id" => $user_id,
            ":classroom_id" => $classroom_id
        ]);
    }

?>