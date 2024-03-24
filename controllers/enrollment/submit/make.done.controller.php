<?php
    require_once "../../../models/enrollment/make.done.assignment.model.php";
    $assignment_id = $_GET['assignment_id'];
    $user_id = $_GET['user_id'];
    makeDone($assignment_id, $user_id);
    header("Location: /view-instruction-assignment");
?>
