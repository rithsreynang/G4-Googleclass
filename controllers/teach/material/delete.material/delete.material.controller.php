<?php
require_once "../../../models/teach/material/delete.material.model.php";
$mater_id = $_GET['material_id'];
$class_id = $_GET['classroom_id'];
deleteMaterial($mater_id);
header("Location: /controllers/teach/classwork.controller.php?classroom_id=$class_id");