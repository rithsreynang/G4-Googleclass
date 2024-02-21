<?php
    require"../../models/classroom/update.classroom.model.php";
    if (isset($_POST['className'])){
        $id = $_POST['id'];
        $name = $_POST['className'];
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $room = $_POST['room'];
        updateClassroom($id, $name , $section, $subject, $room);
    }    
?>