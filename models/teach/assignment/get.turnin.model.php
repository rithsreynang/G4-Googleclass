<?php
    require_once "database/database.php";
    function  getSubmits($assignment_id):array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM submition INNER JOIN users ON submition.user_id=users.user_id  where submition.assignment_id=:assignment_id and submition.submit_status='turnin'");
        $statement->execute([":assignment_id" => $assignment_id]);
        if ($statement->rowCount() > 0){
            return $statement->fetchAll();
        }else{
            return [];
        }
    };

?>