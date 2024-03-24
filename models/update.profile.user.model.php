<?php
require "../../database/database.php";
require "../../models/classroom/get.user.model.php";
function  uploadProfile($profile, $email_user):bool
{
    global $connection;
    $user_id = getUser($email_user)[0];
    $statement = $connection->prepare("UPDATE users SET profile=:profile where user_id = :user_id");
    $statement->execute([':user_id' => $user_id, ':profile' => $profile]);
    return $statement->rowCount();
}