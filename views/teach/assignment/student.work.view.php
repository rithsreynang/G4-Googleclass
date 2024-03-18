<?php
require_once "models/get.user.enroll/get.all.user.enroll.model.php";
require_once "models/teach/assignment/get.an.assignment.model.php";

$assignment_id = $_SESSION['assignment_id'];
$classroom_id = $_SESSION['classroom_id'];
$assign = getAnAssignment($assignment_id);

$students = getAllstudentEnroller($classroom_id);
// print_r($students);
$assignment_id = $_SESSION['assignment_id'];
$allStudentEnroll = getAllUserEnroller($_SESSION['classroom_id']);

?>
<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="../../controllers/teach/assignment/view.assignment/instruction.view.controller.php?assignment_id=<?= $assignment_id ?>" class="btn btn-primary mt-2">Instruction</a>
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">Student work</a>
    </div>
</div>
<!-- <div class="border-bottom mt-2 mb-4 d-flex">
    <div class="" style="margin-bottom:10px;">
        <a href="#" class="text-dark text-decoration-none btn btn-light link">Return</a>
        <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to&tf=1" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16 " class='d-flex align-items-center ml-4 justify-content-end pr-5 w-60'>
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
            </svg>
        </a>
    </div>
    <div class="mb-3 form-check" style="margin-left: 150px; width:150px;">
        <input type="number" class="form-control btn btn-light border border-8 shadow-sm" id="point" name="point">
    </div>
</div> -->
<div class="d-flex justify-content-between">
    <div class="list-student border-right" style="width:45%; background: white-light">
        <div class="d-flex mr-2">
            <i class='fas fa-user text-dark m-3'></i>
            <p class="" style="margin-top: 13px;">All students</p>
        </div>
        <div class="ml-2 d-flex justify-content flex-column mr-2">
            <?php
            foreach ($students as $student) { ?>

                <div class="border m-1 p-2 shadow-sm d-flex justify-content-between align-items-center">
                    <div class="d-flex mt-1">
                        <img src="../../../assets/images/profile/<?= $student['profile'] ?>" alt="profile " class="rounded-circle" style="width: 40px; height: 40px;">
                        <p class="mt-2 ml-2"><?= $student['username'] ?></p>
                    </div>
                    <div style="width: 50%">
                        <form action="" class="d-flex">
                            <input type="number" class="form-control ml-3" id="floatingNumber" placeholder="100" style="width: 45%;">
                            <button class="btn btn-success ml-2">Return</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="submit-homework" style="margin-right: 20px; margin-top: 20px; width:50%">
        <p class="text-primary" style="font-size: 23px;"><?= $assign['title'] ?></p>
        <div class="d-flex">
            <div class="mr-4">
                <h4 class="text-dark">0</h4>
                <p>Turned in</p>
            </div>
            <div class="border-right"></div>
            <div class="ml-4">
                <h4 class="text-dark"><?= count($students) ?></h4>
                <p>Assigned</p>
            </div>
        </div>
    </div>
</div>
<div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>