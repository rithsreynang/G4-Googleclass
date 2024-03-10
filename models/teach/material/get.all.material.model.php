
<?php
require_once "../../database/database.php";
function getAllMaterials($id):array
{
        global $connection;
        $statement = $connection->prepare("SELECT * FROM materials WHERE classroom_id=:id order by material_id desc");
        $statement->execute([":id" => $id]);
        if ($statement->rowCount() > 0) {
            return $statement->fetchAll();
        } else {
            return [];
        }
  

}
?>