<?php
    require_once "database/database.php";
    function getAllUserEnroller($classroom_id):array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM assignments INNER JOIN classroom_enroll on assignments.classroom_id = classroom_enroll.classroom_id WHERE assignments.classroom_id = :classroom_id and classroom_enroll.role ='student';");
        $statement->execute([":classroom_id" => $classroom_id]);
        if ($statement->rowCount() > 0){
            return $statement->fetch();
        }else{
            return [];
        }
    }
?>