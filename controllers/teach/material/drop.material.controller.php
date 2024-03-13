<?php
$classroom_id = $_GET['classroom_id'];
require_once "../../../models/teach/material/drop.material.model.php";
require_once "../../../models/classroom/get.user.model.php";
$fileDestination = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    date_default_timezone_set("Asia/Phnom_Penh");

    //get title, description
    $title = $_POST['title'];
    $discription = $_POST['description'];

    //get file info
    $targetDir = "../../../assets/files/"; 
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowed = array('jpg', 'png', 'jpeg', 'pdf', 'pptx', 'zip', 'txt', 'docx', 'gif', 'xlsx', 'html', 'json', 'js', 'css');

    // Check file size
    if ($_FILES["file"]["size"] > 5000000) { // Adjust the size limit as needed (5MB in this case)
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if (!in_array($fileType, $allowed)) {
        echo "Sorry, only PDF, DOCX, and XLSX files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            $filename = basename($_FILES["file"]["name"]);
            $filepath = $targetFile;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $postDate = date("Y-m-d h:i:sa");
    $material = createMaterial($filename, $discription, $title, $postDate, $classroom_id, $filepath);
    if ($material) {
        header("Location: ../classwork.controller.php?classroom_id=$classroom_id");
    } else {
        header("Location: ./create.material.view.php?classroom_id=$classroom_id");
    }
}
