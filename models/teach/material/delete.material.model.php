<?php
require_once "../../../database/database.php";
function  deleteMaterial($id) {
    global $connection;
    echo $id;
    $statement = $connection->prepare("DELETE from materials where material_id = :id");
    $statement->execute([":id" => $id]);
}

?>