<?php
require_once "models/classroom/get.user.model.php";
require_once "models/classroom/create.classroom.model.php";
$nameError = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!empty($_POST['className'])){
        $className = $_POST['className'];
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $room = $_POST['room'];
        $classCode = randomClassCode();
        $email = $_SESSION['user'][2];
        $user_id = getUser($email)['user_id'];
        $classroom = createClassroom($className, $section, $subject, $room, $user_id, 'teacher', $classCode);
        if ($classroom){
            echo "<script> location.replace('/home'); </script>";
        }
    }
    else{
        $nameError = 'Place complete name of class room';
    }
}
function randomClassCode()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random = '';
    for ($i = 0; $i < 7; $i ++){
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

<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
    <div class="bg-white p-3 col-xl-6">
        <form action="#" method="post">
            <h4 class="text-success mt-1">Crate class</h4>
            <input type="text" class="form-control mt-3" name="className" placeholder="Class name">
            <small class="text-danger"><?= $nameError ?></small>
            <input type="text" class="form-control mt-3" name="section" placeholder="Section">
            <input type="text" class="form-control mt-3" name="subject" placeholder="Subject">
            <input type="text" class="form-control mt-3" name="room" placeholder="Room">
            <div class="d-flex justify-content-end mt-2">
                <a href="/home" class="btn btn-light">cancal</a>
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>