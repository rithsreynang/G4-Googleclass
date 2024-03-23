<?php
    $assignment_id = $_GET['assignment_id'];
    $classroom_id = $_GET['classroom_id'];
    session_start();
    $_SESSION['classroom_id'] = $classroom_id;
    $_SESSION['assignment_id'] = $assignment_id;
    header("Location: /view-done");
?>
