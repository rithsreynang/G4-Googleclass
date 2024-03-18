<?php
function createClassroom($className, $section, $subject, $room, $user_id, $role, $classCode):bool
{
    global $connection;
    $classroom = $connection->prepare("INSERT INTO classroom (classroom_name, section,subject, room, user_id, role, class_code, banner, status) values (:className, :section, :subject, :room, :user_id, :role, :classCode, :banner, :status );");
    $classroom->execute([
        ':className' => $className,
        ':section' => $section,
        ':subject' => $subject,
        ':room' => $room,
        ':user_id' => $user_id,
        ':role' => $role,
        ':classCode' => $classCode,
        ':banner' => '01.jpg',
        ':status' => 'unarchive',
    ]);
    return $classroom->rowCount() > 0;
};

function  classCodeExist(string $classCode): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM classroom where class_code =:classCode");
    $statement->execute([':classCode' => $classCode]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}
?>