<?php
    require_once "database/database.php";
    function deleteClass($id)
    {
        global $connection;
        $class = $connection->prepare("DELETE FROM classroom where classroom_id = :id");
        $class->execute([':id' => $id]);
        
    }

?>