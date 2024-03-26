<?php
session_start();
require_once "../../models/teach/remove.user.in.class.model.php";
$user_id = $_GET['user_id'];
$classroom_id = $_GET['classroom_id'];
removeUser($user_id, $classroom_id);
$_SESSION['classroom_id'] = '';
header("Location: /people-teacher")
?>