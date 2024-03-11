<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
require_once "../../models/classroom/select.classrooms.model.php";
require_once "../../models/classroom/select.student.model.php";
require_once "../../models/teach/material/get.all.material.model.php";
require_once "../../models/teach/assignment/get.all.assignments.model.php";
$id = $_GET['classroom_id'];
$class = getClassroom($id);
$class_code = $class['class_code'];
$allAssignments = getAllAssignment($id);
$allMaterials= getAllMaterials($id);
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_name = getUser($email)['username'];
$user_id = $user[0];
$students = listStudents($id);
?>
<div class="">
    <div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;">
        <div class='nav-item'>
            <a href="#" class="text-white text-decoration-none border-0 btn btn-primary">Stream</a>
            <a href="../../controllers/teach/classwork.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light ">Classwork</a>
            <a href="../../controllers/teach/people.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light ">People</a>
            <a href="../../controllers/teach/grades.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light ">Grades</a>
        </div>
        <div style="padding-right: 50px;">
            <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
            <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
        </div>
    </div>
    <!-- CONTENT FOR SHOW IMAGE AND SOMTHING IN THE CLASSROOM -->
    <div>
        <!-- BANNER IN CLASS -->
        <img src="../../assets/images/classroom/01.jpg" style="width: 96%;" class="mt-4 ml-3 rounded">
        <!-- CONTENT FOR SHOW MEETING, CLASS CODE AND UPCOMMING -->
        <div class="d-flex flex-row justify-content-between p-3">
            <div class=" d-flex flex-column" style="width: 18%;">
                <div class="p-3 border shadow rounded">
                    <h6>Class code</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-warning" id="textBoard"><?= $class_code ?></h5>
                        <button class="btn btn-light" id="button-copy"><i class="fas fa-copy"></i></button>
                    </div>
                </div>
                <div class="mt-3 border rounded">
                    <div class="pl-3 ">
                        <h6 class=" mt-3">Upcoming</h6>
                        <p class="">No work due soon</p>
                        <a href="view.php" class="my-3 text-warning text-decoration-none btn p-1 btn-light">View all</a>
                    </div>
                </div>
            </div>
            <!-- CONTENT FOR SHOW ALL LESSON AND CREATE LESSON -->
            <div style="width: 79%;">
                <div class="shadow p-3 mb-3 bg-body rounded border" id="mydiv">
                    <div href="" class="d-flex flex-row align-items-center">
                        <img src="../../assets/images/classroom/04.jpg" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                        <p class="ml-2 mt-3">Announce something to your class</p>
                        <!-- <i class="fa fa-retweet" style="font-size:25px; color: grey; margin-left: 60%; padding-top:15px;"></i> -->
                    </div>
                </div>

                <div class="d-flex flex-column mt-4" style="margin-left: 15%;">
                <?php
                    if (count($allMaterials) > 0) {
                        foreach ($allMaterials as $material) {
                        
                ?>
                    <div class="card shadow-sm p-0 rounded mt-3" style="width: 84%;">
                        <div class="d-flex align-items-center card-header p-0  justify-content-between col-12">
                            <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse"
                                href="#collapse<?= $material['material_id'] ?>" role="button" aria-expanded="false"
                                aria-controls="collapse<?= $material['material_id'] ?>">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                        </svg>
                                    </div>
                                    <p class="ml-2 mt-3 text-dark"><?= $user_name ?> posted a new material: <?= $material['title'] ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                        <p class="mt-3 fw-bold" style="margin-right: -20px;">
                                            <?php if (!empty($material['date_post'])) {
                                                        // echo $material['date_post'];
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button"
                                        id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22"
                                        height="22" fill="currentColor"
                                        class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                        <li><a class="dropdown-item" href="#">Copy Link</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    
                    </div>
                <?php
                }
                ?>
            <?php
                    }
            ?>
            </div>           

            <div class="d-flex flex-column ">
                    <?php
                    if (count($allAssignments) > 0) {
                        foreach ($allAssignments as $assignment) {
                    ?>
                    <div class="card shadow-sm p-0 rounded mt-3 " style="margin-left: 15%; width:71.5%;">
                        <div class="d-flex align-items-center card-header p-0  justify-content-between col-12">
                            <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse"
                                href="#collapse<?= $assignment['assignment_id'] ?>" role="button" aria-expanded="false"
                                aria-controls="collapse<?= $assignment['assignment_id'] ?>">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex"
                                        style="background-color: #289AE3 ; padding: 7px; color: white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                        </svg>
                                    </div>
                                    <p class="ml-2 mt-3 text-dark">You post a new assignment: <?= $assignment['title'] ?></p>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button"
                                        id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22"
                                        height="22" fill="currentColor"
                                        class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                                        <li><a class="dropdown-item"
                                                href="../../../controllers/teach/assignment/update.assignment.controller.php?classroom_id=<?= $id ?>&assignment_id=<?= $assignment['assignment_id'] ?>">Edit</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="../../controllers/enrollment/create.material.controller.php?classroom_id=<?= $id ?>">Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Copy Link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="collapse border-top p-3 card-body " id="collapse<?= $assignment['assignment_id'] ?>">
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
                            <div class="row">
                                <div class="col">
                                    <p><?= $assignment['description'] ?></p>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="border-left col">
                                            <h2>0</h2>
                                            <p>Turn in</p>
                                        </div>
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
                            <div class="card-footer p-1 mt-1">
                                <a href="../../controllers/teach/assignment.detail/instructions.controller.php"
                                    class="btn btn-primary">View Instruction</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
            </div>
            <?php
                    } else {
            ?>
            <div class="border d-flex flex-row rounded">
                    <img src="../../assets/images/classroom/03.jpg" alt="" width=300px; height=300px;>
                    <div class="mt-5">
                        <p style="font-size: 30px;">This is where you can talk to your class</p>
                        <p>Use the stream to share announcements, post assignments, and respond o student questions</p>
                        <i class="fa fa-gear" style="padding: 10px; border: 1px solid grey; border-radius: 5px; margin-left:73%; margin-top:10px;"><span class="p-2">Stream settings</span></i>
                    </div>
            </div>
            <?php
                    }
            ?>
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

<?php
require_once "../../layouts/class/footer.php";
?>