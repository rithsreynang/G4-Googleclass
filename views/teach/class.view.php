<?php
require_once "models/classroom/select.classrooms.model.php";
require_once "models/classroom/select.student.model.php";
require_once "models/teach/material/get.material/get.all.material.model.php";
require_once "models/teach/assignment/get.all.assignments.model.php";

$id = $_SESSION['classroom_id'];
$class = getClassroom($id);
$class_code = $class['class_code'];
$allAssignments = getAllAssignment($id);
$allMaterials = getAllMaterials($id);
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_name = getUser($email)['username'];
$user_id = $user[0];
$students = listStudents($id);
$index = 0;
?>
<div class="">
    <div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;">
        <div class='nav-item'>
            <a href="#" class="text-white text-decoration-none border-0 btn btn-primary">Stream</a>
            <a href="../../controllers/teach/classwork/classwork.get.id.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none btn btn-light ">Classwork</a>
            <a href="../../controllers/teach/people/people.get.id.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none btn btn-light ">People</a>
            <a href="../../controllers/teach/grade/grade.get.id.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none btn btn-light ">Grades</a>
        </div>
        <div style="padding-right: 50px;">
            <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
            <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 1c5px;"></i>
        </div>
    </div>
    <div class="">
        <div class="d-flex flex-column justify-content-center p-3">
            <div class="d-flex align-items-center justify-content-center">
                <div class="card shadow-sm p-2 d-flex flex-row col-6">
                    <div class="">
                        <img src="../../assets/images/courses/4by3/<?= $class['banner'] ?>" alt="course image" class="card-img-top rounded">
                    </div>
                    <div class="col-7">
                        <p><b><?= $class['classroom_name'] ?></b></p>
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
                        <div class="d-flex align-items-center " style="margin-top: -20px">
                            <h6>Class code : </h6>
                            <p id="textBoard" class="mt-2 ml-2"><?= $class_code ?></p>
                            <button class="btn btn-light ml-3" id="button-copy"><i class="fas fa-copy"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENT FOR SHOW ALL LESSON AND CREATE LESSON -->
            <div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <?php
                    foreach ($allAssignments as $assignment) {
                
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
                                        <p class="ml-2 mt-3 text-dark"> Assignment : <?= $assignment['title'] ?></p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="mt-3 fw-bold" style="margin-right: -20px;">
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
                                <div style="margin-right: 20px;">
                                    <div class="dropdown" style="color: blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button" id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                                            <li>
                                                <a class="dropdown-item" href="../../../controllers/teach/assignment/update.assignment.controller.php?classroom_id=<?= $id ?>&assignment_id=<?= $assignment['assignment_id'] ?>">Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="../../controllers/teach/assignment/delete.assignment.controller.php?classroom_id=<?= $id ?>&assignment_id=<?= $assignment['assignment_id'] ?>">Delete</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Copy Link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse border rounded-bottom p-3 card-body " id="collapse<?= $assignment['assignment_id'] ?>">
                                <p>Post <?php
                                        $post = date_create($assignment['post_date']);
                                        echo date_format($post, "M - d , H:i");
                                        $hour =  date_format($post, "H");
                                        if ($hour > 11) {
                                            echo "pm";
                                        } else {
                                            echo "am";
                                        }
                                        ?></p>
                                <div class="row d-flex align-items-center">
                                    <div class="col-8">
                                        <p><?= $assignment['description'] ?></p>
                                        <?php
                                        if (!empty($assignment['path_file'])) {
                                        ?>
                                            <a href="<?= $assignment['path_file'] ?>" target="_blank" style="text-decoration: none;">
                                                <div class="d-flex flex-1 align-items-center rounded shadow-sm" style="border: 1px solid #EDEAE0;">
                                                    <img src="../../assets/files/drive.png" height="60px" class="border-right p-2">
                                                    <div class="card-title p-1" style="font-size: 15px;"><?= $assignment['file'] ?></div>
                                                </div>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="border-left col">
                                                        <h2>0</h2>
                                                        <p>Turn in</p>
                                                    </div>
                                                    <div class="border-left col">
                                                        <h2><?= count($students) ?></h2>
                                                        <p>Assign</p>
                                                    </div>
                                                    <div class="border-left col">
                                                        <h2>0</h2>
                                                        <p>Grades</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../../controllers/teach/assignment.detail/instructions.controller.php" class="btn btn-primary mt-2">View Instruction</a>
                            </div>
                        </div>
                    <?php
                    }
                    foreach ($allMaterials as $material) {
                    ?>
                        <div class="card p-0 rounded border-0 mt-3 col-10">
                            <div class="d-flex align-items-center border card-header p-0 justify-content-between col-12">
                                <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse" href="#collapsematerial<?= $material['material_id'] ?>" role="button" aria-expanded="false" aria-controls="collapse<?= $index ?>">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                            </svg>
                                        </div>
                                        <p class="ml-2 mt-3 text-dark">Material :  <?= $material['title'] ?></p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="mt-3 fw-bold" style="margin-right: -20px;">Posted
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
                                <div style="margin-right: 20px;">
                                    <div class="dropdown" style="color: blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button" id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                                            <li><a class="dropdown-item" href="../../controllers/teach/material/update.material/get.material.id.controller.php?classroom_id=<?= $id ?>&material_id=<?= $material['material_id'] ?>">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item" href="../../controllers/teach/material/delete.material.controller.php?material_id=<?= $material['material_id'] ?>&classroom_id=<?= $material['classroom_id'] ?>">Delete</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Copy Link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse border rounded-bottom" id="collapsematerial<?= $material['material_id'] ?>">
                                <div class="col card-body">
                                    <p class="mb-3"> <?= $material['description'] ?></p>
                                    <a href="<?= $material['path_file'] ?>" target="_blank" style="text-decoration: none;">
                                        <div class="d-flex align-items-center rounded mb-3 shadow-sm">
                                            <img src="../../assets/files/drive.png" height="60px" class="border-right p-2">
                                            <div class="card-title p-1" style="font-size: 15px;"><?= $material['file'] ?></div>
                                        </div>
                                    </a>
                                    <a href="../../controllers/teach/assignment.detail/instructions.controller.php" class=" btn btn-primary">View Material</a>
                                </div>
                            </div>

                        </div>
                    <?php
                        $index--;
                    }
                    ?>
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