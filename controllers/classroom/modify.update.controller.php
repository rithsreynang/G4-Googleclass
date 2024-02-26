<?php
require_once "../../models/classroom/update.classroom.model.php";
require_once "../../database/database.php";
    $id = $_GET['classroom_id'];
    if (isset($_POST['className'])){
        $name = $_POST['className'];
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $room = $_POST['room'];
        updateClassroom($id, $name , $section, $subject, $room);
    }    
?>