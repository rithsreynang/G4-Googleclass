<?php
function getClassroomsUnarchive($user_id): array
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom  WHERE user_id=:user_id and status='unarchive';");
    $classroom->execute([':user_id' => $user_id]);
    if ($classroom->rowCount() > 0) {
        return $classroom->fetchAll();
    } else {
        return [];
    };
}
function getClassroomsArchive($user_id): array
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom  WHERE user_id=:user_id and status='archive';");
    $classroom->execute([':user_id' => $user_id]);
    if ($classroom->rowCount() > 0) {
        return $classroom->fetchAll();
    } else {
        return [];
    };
}
//get all the class and compare with new class code
function  getAllClassrooom($id)
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom WHERE user_id != :id");
    $classroom->execute([":id" => $id]);
    if ($classroom->rowCount() > 0) {
        return $classroom->fetchAll();
    } else {
        return [];
    };
}

function getClasses($id):array
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom INNER JOIN classroom_enroll ON classroom_enroll.classroom_id = classroom.classroom_id WHERE classroom_enroll.user_id = :id;");
    $classroom->execute([":id" => $id]);
    if ($classroom->rowCount() > 0) {
        return $classroom->fetchAll();
    } else {
        return [];
    };
}
function getClassroom($classroom_id) {
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom  WHERE classroom_id = :classroom_id;");
    $classroom->execute([':classroom_id' => $classroom_id]);
    if ($classroom->rowCount() > 0){
        return $classroom->fetch();
    }
    else{
        return [];
    };
}

?>
