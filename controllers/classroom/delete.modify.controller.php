<?php
    require_once "../../models/classroom/delete.classroom.model.php";
    $id = $_GET['classroom_id'];
    deleteClass($id);
    header("Location: /home");
?>