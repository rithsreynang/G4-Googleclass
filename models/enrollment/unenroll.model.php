<?php
    require_once "../../database/database.php";
    function Unenroll($classroom_id, $user_id){
        global $connection;
        $statement = $connection->prepare("DELETE FROM classroom_enroll WHERE classroom_id=:classroom_id and user_id=:user_id");
        $statement->execute([
            ":classroom_id" => $classroom_id,
            ":user_id" => $user_id
        ]);
    }

?>