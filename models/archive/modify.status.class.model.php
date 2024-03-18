<?php
require_once "../../database/database.php";
function  unarchive( int $id) {
    global $connection;
    $statement = $connection->prepare("UPDATE classroom SET status = 'unarchive' WHERE classroom_id=$id");
    $statement->execute();    
}
function  archive( int $id) {
    global $connection;
    $statement = $connection->prepare("UPDATE classroom SET status = 'archive' WHERE classroom_id=$id");
    $statement->execute();    
}

?>