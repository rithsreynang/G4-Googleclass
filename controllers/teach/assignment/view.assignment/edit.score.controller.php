<?php
require_once "../../../../models/teach/assignment/edit.score.model.php";
$user_id = $_GET['user_id'];
$assign_id = $_GET['assignment_id'];
$score = $_POST['score'];
insertScore($assign_id, $user_id, $score);
header("Location: /student-work");
?>