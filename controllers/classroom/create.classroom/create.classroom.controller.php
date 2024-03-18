<?php
require_once "../../../models/classroom/get.user.model.php";
require_once "../../../models/classroom/create.classroom/create.classroom.model.php";
require_once "../../../database/database.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!empty($_POST['className'])){
        $className = $_POST['className'];
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $room = $_POST['room'];
        $classCode = randomClassCode();
        $email = $_SESSION['user'][1];
        $user_id = getUser($email)['user_id'];
        $classroom = createClassroom($className, $section, $subject, $room, $user_id, 'teacher', $classCode);
        if ($classroom){
            echo "<script> location.replace('/home'); </script>";
        }
    }
    else{
        echo 'Place complete name of class room';
    }
}
function randomClassCode()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random = '';
    for ($i = 0; $i < 10; $i ++){
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