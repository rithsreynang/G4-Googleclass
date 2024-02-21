<?php

session_start();
require "../../database/database.php";

$id = isset($_GET['classroom_id']) ? $_GET['classroom_id'] : null;

if (isset($id)) {
    require '../../models/classroom/delete_classroom.model.php';
    deleteClass($id);
    header('Location: /teach');
    exit(); 
}

?>