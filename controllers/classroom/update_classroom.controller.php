<?php
    if (isset($_GET['classroom_name'])){
        $id = $_GET['id'];
        $name = $_GET['classroom_name'];
        $section = $_GET['section'];
        $subject = $_GET['subject'];
        $room = $_GET['room'];
    }
    require "../../views/classroom/update_classroom.view.php";

?>