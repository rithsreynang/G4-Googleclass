<?php

function  getAllAssignmentAssign($assign): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM assignments WHERE assignment_id=:id");
    $statement->execute([":id" => $assign]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}

?>

<h2>Hello</h2>