<?php
require_once "models/get.user.enroll/get.all.user.enroll.model.php";
require_once "models/teach/assignment/get.an.assignment.model.php";

$assignment_id = $_SESSION['assignment_id'];
$classroom_id = $_SESSION['classroom_id'];
$assign = getAnAssignment($assignment_id);
$students = getAllstudentEnroller($classroom_id);
$assignment_id = $_SESSION['assignment_id'];
$allStudentEnroll = getAllUserEnroller($_SESSION['classroom_id']);

?>
<div class="" style="margin:0px 180px;">
    <div class="border-bottom">
        <div class="" style="margin-bottom:10px;">
            <a href="../../controllers/teach/assignment/view.assignment/instruction.view.controller.php?assignment_id=<?= $assignment_id ?>" class="text-dark text-decoration-none btn btn-light mt-2 link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book-half mr-2" viewBox="0 0 16 16">
                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                </svg>Instruction
            </a>
            <a href="#" class="text-white text-decoration-none btn btn-warning mt-2 link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-workspace mr-1" viewBox="0 0 16 16">
                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                </svg>Student work</a>
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
                            if (!empty($student['profile'])) {
                            ?>
                                <img class="rounded-circle" src="assets/images/profile/<?= $student['profile'] ?>" alt="avatar" style="height: 50px; width: 50px">
                            <?php
                            } else {
                            ?>
                                <div class="bg-primary rounded-circle">
                                    <h2 class="text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 40px">
                                        <b><?= $student['username'][0] ?></b>
                                    </h2>
                                </div>
                            <?php
                            }
                            ?>
                            <p class="mt-2 ml-2"><?= $student['username'] ?></p>
                        </div>
                        <div class="">
                            <form action="" class="d-flex justify-content-end">
                                <input type="number" class="form-control ml-3 border-none" id="floatingNumber" value="<?= $assign['score'] ?>">
                                <button ata-toggle="tooltip" data-placement="top" title="Return to student now" class="btn btn-success ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                                    </svg></button>

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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>