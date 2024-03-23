<?php
    require_once "../../../database/database.php";
    function  makeDone($assign_id, $user_id) {
        global $connection;
        $statement = $connection->prepare("INSERT INTO submition (assignment_id, user_id, submit_status) values(:assign_id, :user_id, :submit_status)");
        $statement->execute([
            ":assign_id" => $assign_id,
            ":user_id" => $user_id,
            ":submit_status" => "turnin"
        ]);
    };

?>