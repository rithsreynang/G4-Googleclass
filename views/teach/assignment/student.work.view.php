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
        <a href="../../controllers/teach/assignment/view.assignment/instruction.view.controller.php?assignment_id=<?= $assignment_id ?>"
            class="btn btn-primary mt-2">Instruction</a>
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">Student work</a>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div class="list-student border-right" style="width:45%; background: white-light">
        <div class="d-flex mr-2">
            <i class='fas fa-user text-dark m-3'></i>
            <p class="" style="margin-top: 13px;">All students</p>
        </div>
        <div class="ml-2 d-flex justify-content flex-column mr-2">
            <?php
            foreach ($students as $student) { ?>

            <div class="border rounded m-1 p-2 shadow-sm d-flex justify-content-between align-items-center">
                <div class="d-flex mt-1 col-6">
                    <?php
                        if (!empty($student['profile'])){    
                        ?>
                    <img class="rounded-circle" src="assets/images/profile/<?= $student['profile'] ?>" alt="avatar"
                        style="height: 50px; width: 50px">
                    <?php
                        }else{
                        ?>
                    <div class="bg-primary rounded-circle">
                        <h2 class="text-white d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 40px">
                            <b><?= $student['username'][0] ?></b>
                        </h2>
                    </div>
                    <?php
                        }
                        ?>
                    <p class="mt-2 ml-2"><?= $student['username'] ?></p>
                </div>
                <div class="col-6">
                    <form action="" class="d-flex justify-content-end">
                        <input type="number" class="form-control ml-3 border-none" id="floatingNumber"
                            placeholder="100">
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