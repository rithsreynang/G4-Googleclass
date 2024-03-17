<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
require_once "../../models/teach/assignment/get.an.assignment.model.php";
require_once "../../models/classroom/select.student.model.php";

$class_id = 1;
$assign_id = 1;

$id = $_GET['classroom_id'];
$assignments = getAssignment($class_id, $assign_id);
var_dump($assignments);
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_name = getUser($email)['username'];
$user_id = $user[0];
$students = listStudents($id);

// var_dump($assignments)
?>

<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">Assigned</a>
        <a href="../../controllers/todo/missing.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link">Missing</a>
        <a href="../../controllers/todo/todo.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link">Done</a>
    </div>
</div>

<div>
    <?php
    foreach ($assignments as $assignment) {
    ?>
        <div class="card p-0 rounded-1 mt-3 col-10">
            <div class="d-flex align-items-center card-header  p-0  justify-content-between col-12">
                <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse" href="#collapse<?= $assignment['assignment_id'] ?>" role="button" aria-expanded="false" aria-controls="collapse<?= $assignment['assignment_id'] ?>">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                            </svg>
                        </div>
                        <p class="" style="padding-top: 12px; margin-left:5px;"><?= $assignments['title'] ?></p>
                    </div>
                </div>
                <div style="margin-right: 20px;">
                    <div class="dropdown" style="color: blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button" id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                        </svg>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">

                            <li>
                                <a class="dropdown-item" href="#">Copy Link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
require_once "../../layouts/class/footer.php"
?>