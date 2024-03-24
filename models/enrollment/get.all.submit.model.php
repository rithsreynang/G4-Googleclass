<?php
    require_once "database/database.php";
    function  getAllSubmits():array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM submition ");
        $statement->execute([]);
        if ($statement->rowCount() > 0){
            return $statement->fetchAll();
        }else{
            return [];
        }
    };

?>