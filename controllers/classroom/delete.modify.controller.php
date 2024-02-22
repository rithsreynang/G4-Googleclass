<?php
    $id = $_GET['classroom_id'];
    require "../../models/classroom/delete.classroom.model.php";
    deleteClass($id);
    header("Location: /home");
?>