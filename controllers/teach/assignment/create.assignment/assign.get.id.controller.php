<?php
    session_start();
    $user_id = $_GET['user_id'];
    $_SESSION['user_id'] = $user_id;
    header("Location: /create-assignment")
?>