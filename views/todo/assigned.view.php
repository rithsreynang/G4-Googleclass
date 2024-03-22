<?php

require_once "models/enrollment/get.assignment.teacher.assign.model.php";

require_once "models/classroom/get.user.model.php";

$assignment_id = $_SESSION['assignment_id'];
$classroom_id = $_SESSION['classroom_id'];
$allAssignments = getAllAssignmentAssign($assignment_id);
print_r($allAssignments);
$email_user = $_SESSION['user'][1];
$user_id = getUser($email_user)['user_id'];
print_r($user_id);


?>
<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">
            <i class='fas fa-user-check'>
                <span>Assigned</span>
            </i>
        </a>
        <a href="../../controllers/todo/missing/missing.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">
            <i class='fas fa-exclamation-circle'>
                <span>Missing</span>
            </i>
        </a>
        <a href="../../controllers/todo/todo-view/todo.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">
            <i class="fas fa-check-circle icon">
                <span class="ml-1">Done</span>
            </i>
        </a>
    </div>
</div>

