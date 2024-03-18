<?php
    $classroom_id = $_GET['classroom_id'];
    session_start();
    $_SESSION['classroom_id'] = $classroom_id;
    header("Location: /classwork-student")
?>