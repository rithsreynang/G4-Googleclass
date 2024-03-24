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
    <div class=" d-flex flex-row ml-3  border-secondary">
        <div class='pt-2 nav-item d-flex align-items-center justify-content-center  border-top border-secondary'
            style="width: 100%; gap: 10px; margin-top: 12px; ">
            <a href="../../controllers/enrollment/steam/enrollment.controller.php?classroom_id=<?= $id ?>"
                class=" text-dark text-decoration-none border-0 btn btn-light ">
                <div class="d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-houses mr-1" viewBox="0 0 16 16">
                        <path
                            d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
                    </svg>
                    Stream
                </div>
            </a>
            <a href="../../controllers/enrollment/classwork/classwork.controller.php?classroom_id=<?= $id ?>"
                class=" text-dark text-decoration-none border-0 btn btn-light ">
                <div class="d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-workspace mr-1" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        <path
                            d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                    </svg>
                    Classwork
                </div>
            </a>
            <a href="#" class="text-white text-decoration-none btn btn-primary">
                <div class="d-flex align-items-center justify-content-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-people-fill mr-1" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg>
                    People
                </div>
            </a>
        </div>

    </div>
    <div class="container col-8 mt-5">
        <div class="border-bottom">
            <div class="d-flex flex-row justify-content-between">
                <h5>Teacher</h5>
            </div>
        </div>
        <div class="mt-3">
            <?php
            foreach ($teacherCreateClass as $teacher) {
            ?>
            <div class="d-flex border p-1 rounded bg-light justify-content-between align-items-center"
                style="height: 60px;">
                <div class="rounded d-flex align-items-center">
                    <?php
                        if (!empty($teacher['profile'])) {
                        ?>
                    <img class=" rounded-circle" src="assets/images/profile/<?= $teacher['profile'] ?>" alt="avatar"
                        style="height: 50px; width: 50px">
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
                <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $teacher['email'] ?>&tf=1"
                    target="_blank" class='d-flex align-items-center  justify-content-end w-60'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16 ">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                </a>
            </div>
            <?php }
             ?>
        </div>
    </div>
    <div class="container col-8 mt-5">
        <div class="d-flex flex-row justify-content-between">
            <h5>Students</h5>
            <div class="d-flex">
                <p><?= $studentNumber . " students" ?></p>
            </div>
        </div>
        <div class="border-top ">
            <?php
            foreach ($students as $student) {
            ?>
            <div class="border bg-light p-1 rounded d-flex justify-content-between mt-3">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="assets/images/profile/<?= $student['profile'] ?>" alt="avatar"
                        style="width: 50px; height: 50px; border-radius: 50%;">
                    <span style=" padding-left: 15px;"><?= $student['username'] ?></span>
                </div>
                <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $student['email'] ?>&tf=1"
                    target="_blank" class='d-flex align-items-center  justify-content-end w-60'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16 ">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>