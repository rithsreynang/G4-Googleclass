<?php
require_once "../../../../models/teach/material/update.material/update.material.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $classroom_id = $_GET['classroom_id'];
    $material_id=  $_GET['material_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $material= updateMaterial($material_id, $title, $description);
    if ($material){
        header("Location: /classwork-teacher");
    }
}