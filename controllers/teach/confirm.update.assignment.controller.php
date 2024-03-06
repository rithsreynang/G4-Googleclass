<?php
require_once "../../models/teach/update.assignment.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $classroom_id = $_GET['classroom_id'];
    $assignment_id = $_GET['assignment_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file_name = $_FILES['file']['name'];
    $score = $_POST['fullscore'];
    $dateline = $_POST['dateline'];
    $assignment = updateAssignment($assignment_id, $title, $description, $file_name, $score, $dateline);
    if ($assignment){
        header("Location: ./classwork.controller.php?classroom_id= $classroom_id");
    }else{
        header("Location: ./update.controller.php?classroom_id=$classroom_id&assignment_id=$assignment_id");
    }
}