<?php
$material_id = $_GET['material_id'];
session_start();
$_SESSION['material_id'] = $material_id;
header("Location: /student-view-material")
?>