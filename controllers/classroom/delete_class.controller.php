<?php

session_start();
require_once "../../database/database.php";

$id = isset($_GET['classroom_id']) ? $_GET['classroom_id'] : null;

if (isset($id)) {
    require_once '../../models/classroom/delete_classroom.model.php';
    deleteClass($id);
    header('Location: /home');
    exit(); 
}

?>


