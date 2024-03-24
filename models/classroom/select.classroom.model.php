<?php
function  getAnClass($id)
{
    global $connection;
    $classroom = $connection->prepare("SELECT * FROM classroom WHERE classroom_id= :id");
    $classroom->execute([":id" => $id]);
    if ($classroom->rowCount() > 0) {
        return $classroom->fetchAll();
    } else {
        return [];
    };
}
?>