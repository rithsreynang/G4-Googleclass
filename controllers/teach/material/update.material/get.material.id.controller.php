<?php
session_start();
$class_id = $_GET['classroom_id'];
$material_id = $_GET['material_id'];
$_SESSION['classroom_id'] = $class_id;
$_SESSION['material_id'] = $material_id;
header("Location: /update-material")
?>