<?php
function createClassroom($classname, $section, $subject, $room, $email): bool
{
    global $connection;
    $user = $connection->prepare("INSERT INTO classroom (classroom_name, section,subject, room, user_id, role) values (:name, :email, :password);");
    $user->execute([
        
    ]);
    return $user->rowCount() > 0;
}
