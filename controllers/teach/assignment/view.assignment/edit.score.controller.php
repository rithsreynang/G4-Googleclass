<?php
    session_start();
    require_once "../../../../models/teach/assignment/edit.score.assignment.model.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $assignment_id = $_GET['assignment_id'];
        $user_id = $_GET['user_id'];
        $score = $_POST['score'];
        if (editScore($assignment_id, $user_id,$score)){
            header("Location: /student-work");
        }
        else{
            echo "Can not update score for student";
        }
    }
?>