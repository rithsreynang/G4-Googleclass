<?php
function createMaterial($fileName, $discription, $title, $postDate, $link):bool
{

    global $connection;
    $material = $connection->prepare("INSERT INTO material(file_name, description, title, post_date, link)  value(:fileName, :discription, :title, :postDate :link);");

    $material->execute([
        ':fileName' => $fileName,
        ':discription' => $discription,
        ':title' => $title,
        ':postDate' => $postDate,
        ':link' => $link,
    ]);
    return $material -> rowCount() >0;
};


