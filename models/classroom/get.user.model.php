<?php
function getUserID($email):array
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM users  WHERE email=:email");
    $classroom->execute([':email' => $email]);
    if ($classroom->rowCount() > 0){
        return $classroom->fetch();
    }
    else{
        return [];
    };
}
?>