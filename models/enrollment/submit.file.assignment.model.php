<?php
    require_once "../../../database/database.php";
    function submitFile( $assignment_id, $user_id, $file_path):bool
    {
        global $connection;
        $assignment = $connection->prepare("INSERT INTO submition (assignment_id, user_id, file_path, submit_status) values(:assignment_id, :user_id, :file_path, :submit_status)");
        $assignment->execute([
            ":assignment_id" => $assignment_id,
            ":user_id" => $user_id,
            ":file_path" => $file_path,
            ":submit_status" => "assign",
        ]);
        return $assignment->rowCount() > 0;
    };

    function useToSubmit( $assignment_id, $user_id,):array
    {
    global $connection;
        $assignment = $connection->prepare("SELECT * FROM submition WHERE $assignment_id=:assignment_id and $user_id=:user_id");
        $assignment->execute([
            ":assignment_id" => $assignment_id,
            ":user_id" => $user_id,
        ]);
        if ($assignment->rowCount() > 0) {
            return $assignment->fetchAll();
        } else {
            return [];
        }
    }
?>