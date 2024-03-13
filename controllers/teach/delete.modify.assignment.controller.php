<?php
require_once "../../models/teach/delete.assignment.model.php";

$classroom_id = $_GET['classroom_id'];
$assignment_id = $_GET['assignment_id'];

deleteAssignment($assignment_id);

header("Location: ./classwork.controller.php?classroom_id=$classroom_id");
exit();