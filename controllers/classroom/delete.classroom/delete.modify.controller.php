<?php
    session_start();
    require_once "../../../models/classroom/delete.classroom/delete.classroom.model.php";
    $id = $_GET['classroom_id'];
    deleteClass($id);
    $_SESSION['classroom_id'] = '';
    header("Location: /home");
?>