<?php
    require_once "../../database/database.php";
    function Unenroll(  $assignment_id, $user_id, $file_path){
        global $connection;
        $assignment = $connection->prepare("INSERT TO submition(assignment_id, user_id, file_path) value(:assignment_id, :user_id, :file_path ");
        $assignment->execute([
            ':assignment_id' => $assignment_id,
            ':user_id' => $user_id,
            ':file_path' => $file_path
        ]);
        return $assignment->rowCount() > 0;

    }

?>