<?php
//  require "views/enrollment/viewmywork.view.php";
    session_start();
    $_SESSION['classroom_id'] = $_GET['classroom_id'];
    header("Location: /view-student-work")
?>
