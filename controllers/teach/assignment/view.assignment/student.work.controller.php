<?php
session_start();
$_SESSION['classroom_id'] = $_GET['classroom_id'];
$_SESSION['assignment_id'] = $_GET['assignment_id'];
header("Location: /student-work")
?>