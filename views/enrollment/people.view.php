<?php

require_once "models/classroom/select.teacher.model.php";
require_once "models/classroom/select.student.model.php";
$id = $_SESSION['classroom_id'];
$teachers = getTeacher($id);
$teacherCreateClass = getTeacherInclass($id);
$students = listStudents($id);
$studentNumber = count($students);

?>
<div class="">
    <div class=" d-flex flex-row ml-3  border-secondary" style="margin-top: -10px;">
        <div>
            <a href="../../controllers/enrollment/steam/enrollment.controller.php?classroom_id=<?= $id ?>" class=" text-dark text-decoration-none border-0 btn btn-light ">Stream</a>
            <a href="../../controllers/enrollment/classwork/classwork.controller.php?classroom_id=<?= $id ?>" class=" text-dark text-decoration-none border-0 btn btn-light ">Classwork</a>
            <a href="#" class="text-white text-decoration-none btn btn-primary text-white">People</a>
        </div>
        <div style="padding-right: 50px;">
            <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
            <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
        </div>
    </div>
    <div class="container col-8 mt-5">
        <div class="border-bottom">
            <div class="d-flex flex-row justify-content-between">
                <h3>Teachers</h3>
            </div>
        </div>
        <div class="mt-2 ">
            <?php
            foreach ($teacherCreateClass as $teacher) {
            ?>
                <div class="d-flex card-header justify-content-between align-items-center" style="height: 60px;">
                    <div class="rounded d-flex align-items-center">
                        <?php
                        if (!empty($teacher['profile'])) {
                        ?>
                            <img class=" rounded-circle" src="assets/images/profile/<?= $teacher['profile'] ?>" alt="avatar" style="height: 50px; width: 50px">
                        <?php
                        } else {
                        ?>
                            <div class="bg-primary rounded-circle" style="width: 50px; height: 45px">
                                <h2 class="text-white d-flex align-items-center justify-content-center">
                                    <b><?= $teacher['username'][0] ?></b>
                                </h2>
                            </div>
                        <?php
                        }
                        ?>
                        <span style="padding-left: 15px;"><?= $teacher['username'] ?></span>
                    </div>
                    <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $teacher['email'] ?>&tf=1" target="_blank" class='d-flex align-items-center  justify-content-end w-60'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16 ">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                    </a>
                </div>
            <?php }
            foreach ($teachers as $teacher) {
            ?>
                <div class="d-flex card-header justify-content-between align-items-center" style="height: 60px;">
                    <div class="card-header rounded d-flex justify-content-between">
                        <?php
                        if (!empty($teacher['profile'])) {
                        ?>
                            <img class=" rounded-circle" src="assets/images/profile/<?= $teacher['profile'] ?>" alt="avatar" style="height: 50px;">
                        <?php
                        } else {
                        ?>
                            <div class="bg-primary rounded-circle mt-4">
                                <h2 class="text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px">
                                    <b><?= $teacher['username'][0] ?></b>
                                </h2>
                            </div>
                        <?php
                        }
                        ?>
                        <span style="padding-left: 15px;"><?= $teacher['username'] ?></span>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="../../controllers/teach/remove.user.in.class.controller.php?user_id=<?= $teacher['user_id'] ?>&classroom_id=<?= $id ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" color='red' fill="currentColor" class="bi bi-trash3 mr-2" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </a>
                        <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $teacher['email'] ?>&tf=1" target="_blank" class='d-flex align-items-center justify-content-end w-60'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16 ">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container col-8 mt-5">

        <div class="d-flex flex-row justify-content-between">
            <h3>Students</h3>
            <div class="d-flex">
                <p><?= $studentNumber . " students" ?></p>
            </div>
        </div>

        <div class="border-top ">
            <?php
            foreach ($students as $student) {
            ?>
                <div class="card-header rounded d-flex justify-content-between mt-2" style="height: 60px;">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="">
                            <?php
                            if (!empty($student['profile'])) {
                            ?>
                                <img class="rounded-circle" src="assets/images/profile/<?= $student['profile'] ?>" alt="avatar" style="height: 50px;">
                            <?php
                            } else {
                            ?>
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px">
                                    <h2 class="text-white">
                                        <b> <?= $student['username'][0] ?> </b>
                                    </h2>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <span style="padding-left: 15px;"><?= $student['username'] ?></span>
                    </div>
                    <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $student['email'] ?>&tf=1" target="_blank" class='d-flex align-items-center  justify-content-end w-60'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16 ">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>