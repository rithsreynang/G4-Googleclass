<?php
session_start();
require "../../database/database.php";
require "../../models/classroom/create_classroom.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!empty($_POST['className'])){
        $classname = $_POST['className'];
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $room = $_POST['room'];
        $email = $_SESSION['user'][2];
        createClassroom($classname, $section, $subject, $room, $email);
    }
}
?>