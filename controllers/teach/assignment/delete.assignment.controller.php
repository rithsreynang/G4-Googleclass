<?php
require_once "../../../models/teach/assignment/delete.assignment.model.php";

$classroom_id = $_GET['classroom_id'];
$assignment_id = $_GET['assignment_id'];
echo $classroom_id;
echo $assignment_id;
deleteAssignment($assignment_id);

header("Location: ../classwork.controller.php?classroom_id=$classroom_id");
exit();