<?php
require_once "../../../models/teach/material/update.material.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $material_id=  $_GET['material_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    // if (isset($_POST['file'])){
    //     $file = $_FILES['files'];
    //     $fileName = $file['name'];
    //     $fileTemName = $_FILES['files']['tmp_name'];
    //     $fileSize = $file['size'];
    //     $fileError = $file['error'];
    //     $fileType = $file['type'];
    //     $fileExt = explode('.', $fileName);
    //     $fileActualExt = strtolower(end($fileExt));
    //     $allowed = array('jpg', 'png', 'jpeg', 'pdf', 'pptx', 'zip', 'docx');
    //     $postDate = date("Y-m-d h:i:sa");
    //     if ($file) {
    //         if (in_array($fileActualExt, $allowed)) {
    //             if ($fileError == 0) {
    //                 if ($fileSize < 100000000) {
    //                     $fileNameNew = uniqid('', 'true') . "." . $fileActualExt;
    //                     $fileDestination = '../../../assets/files/' . $fileNameNew;
    //                     move_uploaded_file($fileTemName, $fileDestination);
    //                     print_r($fileName);
    //                     print_r($fileDestination);
    //                 }
    //             }
    //         } else {
    //             echo "<script> alert('can not upload this file') </script>";
    //         }
    //     }
    // }
    $meterial= updateMaterial($material_id, $title, $description);
    if ($meterial){
        header("Location: ../classwork.controller.php?classroom_id= $classroom_id");
    }
}