<?php
    require "../../database/database.php";
    $statement = $connection->prepare("select * from users");
    $statement->execute();
    $users = $statement->fetchAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        foreach ($users as $value){
            if ($value['email'] == $email){
                
            };
        }
    }
?>

