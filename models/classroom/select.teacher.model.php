<?php
    require_once "../../database/database.php";
    function getTeacher($classroom_id):array {
        global $connection;
        $statement = $connection->prepare("SELECT * from classroom_enroll 
        INNER JOIN users ON users.user_id = classroom_enroll.user_id
        where classroom_enroll.role='teacher' and classroom_id=:classroom_id");
        $statement->execute([":classroom_id" => $classroom_id]);
        if ($statement->rowCount() > 0){
            return $statement->fetchAll();
        }
        return [];
    }

    //get teacher that create classroom
    function getTeacherInclass($classroom_id):array {
        global $connection;
        $statement = $connection->prepare("SELECT * from classroom
        INNER JOIN users ON users.user_id = classroom.user_id
        where classroom.role='teacher' and classroom_id=:classroom_id");
        $statement->execute([":classroom_id" => $classroom_id]);
        if ($statement->rowCount() > 0){
            return $statement->fetchAll();
        }
        return [];
    }
?>