<?php
require_once "models/classroom/select.classrooms.model.php";
require_once "models/teach/material/get.material/get.all.material.model.php";
require_once "models/teach/assignment/get.all.assignments.model.php";
require_once "models/classroom/select.student.model.php";
require_once "models/classroom/select.classrooms.model.php";
require_once "models/classroom/select.student.model.php";
$id = $_SESSION['classroom_id'];
$class = getClassroom($id);
$allAssignments = getAllAssignment($id);
$allMaterials = getAllMaterials($id);
$user = getUser($email);
$user_name = getUser($email)['username'];
?>

<div class="">
    <div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;">
        <div class='nav-item'>
            <a href="#" class="text-white text-decoration-none border-0 btn btn-primary">Stream</a>
            <a href="../../controllers/enrollment/classwork/classwork.controller.php?classroom_id=<?= $id ?>"
                class="text-dark text-decoration-none border-0 btn btn-light ">Classwork</a>
            <a href="../../controllers/enrollment/people/people.controller.php?classroom_id=<?= $id ?>"
                class="text-dark text-decoration-none border-0 btn btn-light ">People</a>
        </div>
        <div style="padding-right: 50px;">
            <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
            <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
        </div>
    </div>
    <img src="../../assets/images/classroom/01.jpg" style="width: 96%;" class="mt-4 ml-3 rounded">
    <div class="mt-4">
                <div class="d-flex flex-column" style="margin-left: 140px">
                    <?php
                    if (count($allMaterials) > 0 && count($allAssignments) > 0) {
                        foreach ($allMaterials as $material) {
                    ?>
                            <div class="card rounded mt-3 col-10 p-0">
                                <div class="d-flex align-items-center justify-content-between col-12">
                                    <a href="" style="text-decoration:none col-8">
                                        <div class="d-flex flex-column justify-content-between">
                                            <div class="">
                                                <div class="d-flex  align-items-center col-12">
                                                    <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-2 mt-3 text-dark"> New material :
                                                        <?= $material['title'] ?></p>
                                            </div>

                                                <div class="ml-5" >
                                                    
                                                    <p >
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
                                        </div>
                                    </a>
                                    <div style="margin-right: 10px;">
                                        <div class="dropdown" style="color: blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button" id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            </svg>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                                    
                                                <li><a class="dropdown-item" href="#">Copy Link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        foreach ($allAssignments as $assignment) {
                        ?>
                            <div class="card p-0 border border-2 rounded-1 mt-3 col-10">
                                <div class="d-flex align-items-center  p-0  justify-content-between col-12">
                                    <a href="">
                                        <div class=" d-flex flex-column col-10 " data-bs-toggle="collapse" href="#collapse<?= $assignment['assignment_id'] ?>" role="button" aria-expanded="false" aria-controls="collapse<?= $assignment['assignment_id'] ?>">
                                            <div class="d-flex align-items-center  mr-5 flex-row justify-content-between " style="width: 100%;">
                                                <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                                    </svg>
                                                </div>
                                                <p class="ml-2 mt-3 text-dark  ">New assignment : <?= $assignment['title'] ?></p>
                                            </div>
                                            <div class="ml-5">
                                                <p class=" fw-bold " style="margin-right: 10px; ">
                                                    <?php if (!empty($assignment['dateline'])) {
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
                                    </a>
                                    <div style="margin-right: 20px; ">
                                        <div class="dropdown " style="color: blue">
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
                        <?php
                        }
                        ?>
                </div>
            <?php
                    } else {
            ?>
                <div class="border d-flex flex-row rounded col-10">
                    <img src="../../assets/images/classroom/03.jpg" alt="" width=300px; height=300px;>
                    <div class="mt-5">
                        <p style="font-size: 30px;">This is where you can talk to your class</p>
                        <p>Use the stream to share announcements, post assignments, and respond o student questions
                        </p>
                        <i class="fa fa-gear" style="padding: 10px; border: 1px solid grey; border-radius: 5px; margin-left:73%; margin-top:10px;"><span class="p-2">Stream settings</span></i>
                    </div>
                </div>
            <?php
                    }
            ?>
            </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
