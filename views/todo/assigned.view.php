<?php

// require_once "models/teach/assignment/get.all.assignments.model.php";
// require_once "models/teach/material/get.material/get.all.material.model.php";
// require_once "models/classroom/select.student.model.php";
require_once "models/enrollment/get.assignment.teacher.assign.model.php";
require_once "models/classroom/get.user.model.php";
require_once "models/teach/assignment/get.user.assignment.php";
$email_user = $_SESSION['user'][1];
$user_id = getUser($email_user)['user_id'];
$allAssignmentForEnrollStudent = allAssignmentForEnrollStudent($user_id);
?>
<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">
            <i class="fas fa-check-circle icon">
                <span class="ml-1">Assigned</span>
            </i></a>
        <a href="../../controllers/todo/missing/missing.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">Missing</a>
        <a href="../../controllers/todo/todo-view/todo.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">Done</a>
    </div>
</div>
<div>
    <div class="dropdown mt-4" style="margin-left: 5%;">
        <button class="btn border border-8 shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 250px">
            <span class="p-2" id="selectedText">Select your option</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width:250px;">
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('All')">All</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Assigned')">Assigned</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Turned in')">Turned in</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Missing')">Missing</a></li>
        </ul>
    </div>
</div>
