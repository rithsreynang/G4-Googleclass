<?php
    require_once "../../../database/database.php";
    function deleteSubmit($submit_id){
        global $connection;
        $statement = $connection->prepare("delete from submition where submit_id=:submit_id");
        $statement->execute([
            ":submit_id" => $submit_id,
        ]);
    }


    function unSubmit($submit_id) {
        global $connection;
        $statement = $connection->prepare("update submition set submit_status='assign' where submit_id=:submit_id");
        $statement->execute([
            ":submit_id" => $submit_id,
        ]);
    }
?>