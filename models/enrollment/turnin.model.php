<?php
    require_once ("../../../database/database.php");
    function turnInAssignment( int $assignment_id, int $user_id)
    {   
        echo $assignment_id;
        global $connection;
        $query = "UPDATE submition SET submit_status='turnin'";
        $assignment = $connection->prepare($query);
        $assignment->execute([

        ]);
    }
?>