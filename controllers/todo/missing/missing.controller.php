<?php
    $assignment_id = $_GET['assignment_id'];
    $classroom_id = $_GET['classroom_id'];
    session_start();
    $_SESSION['assignment_id'] = $assignment_id;
    $_SESSION['classroom_id'] = $classroom_id;
    header("Location: /view-missing");
?>
