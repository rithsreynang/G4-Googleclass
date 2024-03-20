<?php
require_once "models/classroom/select.classrooms.model.php";
require_once "models/classroom/select.student.model.php";
require_once "models/teach/material/get.material/get.all.material.model.php";
require_once "models/teach/assignment/get.all.assignments.model.php";

$classroom_id = $_SESSION['classroom_id'];
$class = getClassroom($classroom_id);
$class_code = $class['class_code'];
$allAssignments = getAllAssignment($classroom_id);
$allMaterials = getAllMaterials($classroom_id);
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_name = getUser($email)['username'];
$user_id = $user[0];
$students = listStudents($classroom_id);
$index = 0;
?>
<div class="mt-4">
    <div class="d-flex flex-row mb-3" style="margin-top: -60px">
        <div class='nav-item d-flex align-items-center justify-content-center' style="width: 100%; gap: 10px; margin-left: 87px">
            <a href="#" class="text-white text-decoration-none border border-warning btn btn-warning"><b>
                    <div class="d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-houses mr-1" viewBox="0 0 16 16">
                            <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
                        </svg> Stream</div>

                </b></a>
            <a href="../../controllers/teach/classwork/classwork.get.id.controller.php?classroom_id=<?= $classroom_id ?>" class="text-dark text-decoration-none btn btn-light border"><b>
                    <div class="d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-workspace mr-1" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                        </svg>Classwork</div>
                </b></a>
            <a href="../../controllers/teach/people/people.get.id.controller.php?classroom_id=<?= $classroom_id ?>" class="text-dark text-decoration-none btn btn-light border"><b>
                    <div class="d-flex align-items-center justify-content-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill mr-1" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                        People
                    </div>
                </b></a>
            <a href="../../controllers/teach/grade/grade.get.id.controller.php?classroom_id=<?= $classroom_id ?>" class="text-dark text-decoration-none btn btn-light border"><b>
                    <div class="d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-mortarboard-fill mr-1" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                        </svg>Grades</div>
                </b></a>

        </div>
       
    </div>
    <div class="">
        <div class="d-flex flex-column justify-content-center p-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="col-3 bg-light card p-2 rounded" style="height: 174px;">
                    <p class="text-primary"><b>Upcoming</b></p>
                    <?php
                    $number = 0;
                    foreach ($allAssignments as $assignment) {
                        $curDate = date('Y-m-d h:i:sa');
                        $dateline = $assignment['dateline'];
                        if ($curDate < $dateline and $number < 2) {
                            $number++
                    ?>
                            <div style="font-size: 15px; margin-top: -13px">
                                <?php if (!empty($assignment['dateline'])) {
                                    $date = date_create($assignment['dateline']);
                                    echo "Due " . date_format($date, "M - d , H:i");
                                    $hour =  date_format($date, "H");
                                    if ($hour > 11) {
                                        echo "pm";
                                    } else {
                                        echo "am";
                                    }
                                }
                                ?>
                                <br>
                                <a href="controllers/teach/assignment/view.assignment/student.work.controller.php?classroom_id=<?= $assignment['classroom_id'] ?>&assignment_id=<?= $assignment['assignment_id'] ?>" style="color: black;" data-toggle="tooltip" data-placement="top" title="Assignment have not done yet!"><?= $assignment['title'] ?></a>
                                <br>
                            </div>
                            <br>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="card p-2 d-flex  flex-row align-items-center bg-white col-6">
                    <div class="">
                        <img src="../../assets/images/courses/4by3/<?= $class['banner'] ?>" alt="course image" class="card-img-top rounded">
                    </div>
                    <div class="col-7 ml-2 bg-light rounded">
                        <h4 class="mb-3 text-primary"><b><?= $class['classroom_name'] ?></b></h4>
                        <?php
                        if (!empty($class['section'])) {
                        ?>
                            <p style="margin-top: -12px" ;>Section : <?= $class['section'] ?>
                            </p>
                        <?php
                        }
                        if (!empty($class['subject'])) {
                        ?>
                            <p style="margin-top: -12px">Subject : <?= $class['subject'] ?></p>
                        <?php
                        }
                        if (!empty($class['room'])) {
                        ?>
                            <p style="margin-top: -12px">Room : <?= $class['room'] ?></p>
                        <?php
                        }
                        ?>
                        <div class="d-flex align-items-center " style="margin-top: -20px" data-toggle="tooltip" data-placement="top" title="Copy class code">
                            <h6>Class code : </h6>
                            <p id="textBoard" class="mt-2 ml-2"><b><?= $class_code ?></b></p>
                            <button class="btn btn-light ml-3" id="button-copy"><i class="fas fa-copy"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card bg-light p-2 d-flex justify-content-center align-items-center" style="height: 173px;" >
                    <img class="rounded-circle" src="assets/images/profile/<?= $class['profile'] ?>" alt="avatar" style="height: 40px;">
                    <p class="text-primary"><b><?= $class['username'] ?></b></p>
                    <p style="margin-top: -13px">Teacher of this class</p>
                    <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $class['email'] ?>&tf=1" target="_blank" class='d-flex align-items-center  justify-content-end w-60'>
                        <p style="margin-top: -13px" class="text-wrap"><?= $class['email'] ?></p>
                    </a>
                </div>
            </div>
            <div>
                <div class="d-flex flex-row align-items-center justify-content-center mt-5 ">
                    <div class="d-flex p-0 flex-column col-9">
                        <?php
                        foreach ($allAssignments as $assignment) {
                        ?>
                            <div class="p-0 mb-2">
                                <div class="d-flex align-items-center bg-light card p-0  justify-content-between col-12" data-toggle="tooltip" data-placement="top" title="Assignment : <?= $assignment['title'] ?>">
                                    <div class=" d-flex flex-row justify-content-between col-12">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                                </svg>
                                            </div>
                                            <a href="../../controllers/teach/assignment/view.assignment/instruction.view.controller.php?assignment_id=<?= $assignment['assignment_id'] ?>" class="ml-2 text-dark text-decoration-none"> Assignment : <?= $assignment['title'] ?></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="mt-3 fw-bold">
                                                <?php if (!empty($assignment['dateline'])) {
                                                    // echo $assignment['dateline'];
                                                    $date = date_create($assignment['dateline']);

                                                    echo "Due " . date_format($date, "M - d , H:i");
                                                    $hour =  date_format($date, "H");
                                                    if ($hour > 11) {
                                                        echo "pm";
                                                    } else {
                                                        echo "am";
                                                    }
                                                } else {
                                                    echo "No due date";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        foreach ($allMaterials as $material) {
                        ?>
                            <div class="card p-0 rounded border-0 mb-2 ">
                                <div class="d-flex align-items-center border card bg-light p-0 justify-content-between col-12" data-toggle="tooltip" data-placement="top" title="Material : <?=  $material['title']?>">
                                    <div class=" d-flex flex-row justify-content-between col-12">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                                </svg>
                                            </div>
                                            <a href="../../controllers/teach/material/view-materials/material.instruction.controller.php?material_id=<?= $material['material_id'] ?>?material_id=<?= $material['material_id'] ?>" class="ml-2 text-dark text-decoration-none"> Material : <?= $material['title'] ?></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="mt-3 fw-bold">Posted
                                                <?php if (!empty($material['date_post'])) {
                                                    $date = date_create($material['date_post']);
                                                    echo date_format($date, "M - d , H:i");
                                                    $hour =  date_format($date, "H");
                                                    if ($hour > 11) {
                                                        echo "pm";
                                                    } else {
                                                        echo "am";
                                                    }
                                                } else {
                                                    echo "No due date";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const copyToClipboard = () => {
        const classCodeElement = document.getElementById('textBoard');
        const classCode = classCodeElement.innerText;
        navigator.clipboard.writeText(classCode);
    };
    const buttonCopy = document.getElementById('button-copy');
    buttonCopy.addEventListener('click', () => {
        copyToClipboard();
    });
</script>