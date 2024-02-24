<?php
function updateClassroom($id, $name , $section, $subject, $room)
{
    global $connection;
    $classroom = $connection->prepare("update classroom set classroom_name=:name, section=:section, subject=:subject, room=:room where classroom_id=:id;");
    $classroom->execute([
        ':id' => $id,
        ':name' => $name,
        ':section' => $section,
        ':subject' => $subject,
        ':room' => $room,
    ]);
    header("Location: /home");
};
?>
