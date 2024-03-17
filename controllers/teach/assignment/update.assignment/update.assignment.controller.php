<?php
    session_start();
    $assign_id = $_GET['assignment_id'];
    $classroom_id = $_GET['classroom_id'];
    $_SESSION['assignment_id'] = $assign_id;
    header("Location: /update-assignment")
    ?>