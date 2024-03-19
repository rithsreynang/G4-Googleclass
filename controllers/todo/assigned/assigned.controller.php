<?php
    $assignment_id = $_GET['assignment_id'];
    var_dump($assignment_id);
    session_start();
    $_SESSION['assignment_id'] = $assignment_id;
    header("Location: /view-assigned");
?>
