<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
require_once "../../models/teach/assignment/get.all.assignments.model.php";
require_once "../../models/classroom/select.student.model.php";
$id = $_GET['classroom_id'];
$allAssignments = getAllAssignment($id);
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_id = $user[0];
$students = listStudents($id);
?>

<div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;">
    <?php foreach ($students as $student) { ?>
        <div class=" ml-5 mt-5">
            <img src="../../assets/images/profile/<?= $student["profile"] ?>" alt="" class="rounded-circle" style="width: 60px; height: 60px;">
            <span style="padding-left: 15px;"><?= $student["username"] ?></span>
        </div>
    <?php } ?>
</div>

<div class="mt-4" style="margin-left: 5%; border-top: 1px solid grey; width:85%">
    <div class="dropdown mt-4">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-plus" style=" color: white; font-size:20px; "><span class="p-2">View your work<span></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">All</a></li>
            <li><a class="dropdown-item" href="#">Assigned</a></li>
            <li><a class="dropdown-item" href="#">Turned in</a></li>
            <li><a class="dropdown-item" href="#">Missing</a></li>
        </ul>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>