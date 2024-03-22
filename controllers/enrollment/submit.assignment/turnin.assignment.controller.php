<?php
    require_once "../../../models/enrollment/turnin.model.php";
    $assignment_id = $_GET['assignment_id'];
    $user_id = $_GET['user_id'];
    echo $assignment_id;
    echo $user_id;
    turnInAssignment($assignment_id, $user_id)
?>