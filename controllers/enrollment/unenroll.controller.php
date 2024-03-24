<?php
require_once "../../models/enrollment/unenroll.model.php";
$classroom_id = $_GET['classroom_id'];
$user_id = $_GET['user_id'];
Unenroll($classroom_id, $user_id);
header("Location: /home")
?>