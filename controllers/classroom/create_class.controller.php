<?php
session_start();
require "../../database/database.php";
require "../../models/classroom/create_classroom.model.php";
require "../../models/classroom/get_user.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!empty($_POST['className'])){
        $className = $_POST['className'];
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $room = $_POST['room'];
        $classCode = randomClassCode();
        $email = $_SESSION['user'][2];
        $user_id = getUserID($email)['user_id'];
        $classroom = createClassroom($className, $section, $subject, $room, $user_id, 'teacher', $classCode);
        header("Location: /home");
    }
}
function randomClassCode()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random = '';
    for ($i = 0; $i < 16; $i ++){
        $random .= $characters[rand(0, strlen($characters))];
    }
    $class = classCodeExist($random);
    if (count($class) == 0){
        return $random;
    }else{
        randomClassCode();
    }
}
?>