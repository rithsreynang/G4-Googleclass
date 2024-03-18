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

function getUserId($id) {
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE user_id=:id");
    $statement->execute([":id" => $id]);
    if ($statement->rowCount() > 0){
        return $statement->fetch();
    }else{
        return [];
    }
}


