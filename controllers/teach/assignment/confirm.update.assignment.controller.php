<?php
require_once "../../../models/teach/assignment/update.assignment.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $classroom_id = $_GET['classroom_id'];
    $assignment_id = $_GET['assignment_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $score = $_POST['fullscore'];
    $dateline = $_POST['dateline'];
    if (isset($_FILES['file'])){
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTemName = $_FILES['file']['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'png', 'jpeg', 'pdf', 'pptx', 'zip', 'txt', 'docx', 'gif', 'xlsx', 'json', 'js');
        $postDate = date("Y-m-d h:i:sa");
        if ($file) {
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError == 0) {
                    if ($fileSize < 100000000) {
                        $fileNameNew = uniqid('', 'true') . "." . $fileActualExt;
                        $fileDestination = '../../../assets/files/' . $fileNameNew;
                        move_uploaded_file($fileTemName, $fileDestination);
                    }
                }
            } else {
                echo "<script> alert('can not upload this file') </script>";
            }
            $assignment = updateAssignment($assignment_id, $title, $description, $fileDestination, $score, $dateline, $fileName);
        }
    }
    header("Location: ../classwork.controller.php?classroom_id= $classroom_id");
}
