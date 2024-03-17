<?php
require "../../../database/database.php";
$classroom_id = $_GET['classroom_id'];
$img_id = $_GET['img_id'];
function changeBanner($banner, $id)
{
    global $connection;
    $classroom = $connection->prepare("update classroom set banner=:banner where classroom_id=:id;");
    $classroom->execute([
        ':banner' => $banner,
        ':id' => $id
    ]);
    header("Location: /home");
};
changeBanner($img_id,  $classroom_id);
?>
