<?php
$classroom_id = $_GET['classroom_id'];
require_once "../../../models/teach/material/drop.material.model.php";
require_once "../../../models/classroom/get.user.model.php";
$fileDestination = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    date_default_timezone_set("Asia/Phnom_Penh");
    $title = $_POST['title'];
    $discription = $_POST['description'];
    $file = $_FILES['files'];
    $fileName = $file['name'];
    $fileTemName = $_FILES['files']['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'png', 'jpeg', 'pdf', 'pptx', 'zip', 'docx');
    $postDate = date("Y-m-d h:i:sa");
    if ($file) {
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError == 0) {
                if ($fileSize < 10000000) {
                    $fileDestination = '../../../assets/files/' . $fileName;
                    move_uploaded_file($fileTemName, $fileDestination);
                }
            }
        }
    }
    $material = createMaterial($fileDestination, $discription, $title, $postDate, $classroom_id);
    if ($material) {
        header("Location: ../classwork.controller.php?classroom_id=$classroom_id");
    } else {
        header("Location: ./create.material.view.php?classroom_id=$classroom_id");
    }
}