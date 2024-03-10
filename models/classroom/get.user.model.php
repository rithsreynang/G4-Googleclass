<?php
function getUser($email):array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $statement->execute([":email" => $email]);
    if ($statement->rowCount() > 0){
        return $statement->fetch();
    }else{
        return [];
    }
}




