<?php

require_once "models/teach/assignment/get.an.assignment.model.php";
require_once "models/teach/assignment/get.all.assignments.model.php";
require_once "models/teach/material/get.material/get.all.material.model.php";
require_once "models/classroom/select.student.model.php";

$id = $_SESSION['classroom_id'];
$allAssignments = getAllAssignment($id);
$allMaterials = getAllMaterials($id);
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_id = $user[0];
$students = listStudents($id);
$index = 0;
?>
<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="../../controllers/todo/assigned/assigned.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">
            <i class="fas fa-check-circle icon">
                <span class="ml-1">Assigned</span>
            </i></a>
        </a>
        <a href="../../controllers/todo/missing/missing.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">Missing</a>
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">Done</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>