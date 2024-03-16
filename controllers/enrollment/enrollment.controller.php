<?php
    session_start();
    $classroom_id = $_GET['classroom_id'];
    $_SESSION['classroom_id'] = $classroom_id;
    header("Location: /steam-student");
?>