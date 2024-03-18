<?php
require_once "../../models/archive/modify.status.class.model.php";
$classroom_id = $_GET['classroom_id'];
archive($classroom_id);
header("Location: /home");
?>