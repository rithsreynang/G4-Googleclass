<?php
    session_start();
    $id = $_GET['classroom_id'];
    $_SESSION["classroom_id"] = $id;
    header("Location: /classwork-teacher")
?>