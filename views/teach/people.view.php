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
            <a href="../../controllers/teach/steam/class.controller.php?classroom_id=<?= $id ?>"
                class=" text-dark text-decoration-none  btn btn-light ">Stream</a>
            <a href="../../controllers/teach/classwork/classwork.get.id.controller.php?classroom_id=<?= $id ?>"
                class=" text-dark text-decoration-none  btn btn-light ">Classwork</a>
            <a href="#" class="text-white text-decoration-none btn btn-primary text-white">People</a>
            <a href="../../controllers/teach/grade/grade.get.id.controller.php?classroom_id=<?= $id ?>"
                class=" text-dark text-decoration-none  btn btn-light ">Grades</a>
        </div>
        <div>
            <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
            <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
        </div>
    </div>
    <div class="container card col-8 mt-3 shadow-sm">
        <div>
            <div class="d-flex flex-row justify-content-between">
                <p style="font-size: 35px;">Teachers</p>
                <a data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false"
                    aria-controls="multiCollapseExample1">
                    <i class="fa fa-user-plus" style="font-size: 20px; padding-top: 20px; padding-left: 15px; "></i>
                </a>
            </div>
            <div class="row " style="width: 900px; ">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center"
                            style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                            <div class="bg-white p-3 col-xl-6 " style="width:35%; height:60vh;">
                                <form
                                    action="../../controllers/email/email.controller.php?classroom_id=<?= $_GET['classroom_id'] ?>"
                                    method="post" enctype="multipart/form-data">
                                    <p class="mt-1 mb-4 border-bottom">Invite teachers</p>
                                    <div class="text-success mt-1 mb-4">
                                    </div>
                                    <input type="email" class="form-control mt-5" name="email"
                                        placeholder="Type an email">
                                    <p class="border-top" style="font-size: 14px; margin-top:90px">Teachers you add can
                                        do everything you can, except delete the class.</p>
                                    <div class="d-flex justify-content-end">
                                        <a href="" class="btn btn-light">cancel</a>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top">
            <?php
            foreach ($teacherCreateClass as $teacher) {
            ?>
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center justify-content-center">
                    <?php
                    if (!empty($teacher['profile'])){    
                    ?>
                    <img class="rounded-circle" src="assets/images/profile/<?= $teacher['profile'] ?>" alt="avatar"
                        style="height: 50px;">
                    <?php
                        }else{
                        ?>
                    <div class="bg-primary rounded-circle mt-2">
                        <h2 class="text-white d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 45px">
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
            foreach ($teachers as $teacher) {
            ?>
            <div class="d-flex justify-content-between m-2">
                <div class="d-flex ">
                    <?php
                    if (!empty($teacher['profile'])){    
                    ?>
                    <img class="rounded-circle" src="assets/images/profile/<?= $teacher['profile'] ?>" alt="avatar"
                        style="height: 50px;">
                    <?php
                            }else{
                            ?>
                    <div class="bg-primary rounded-circle mt-4">
                        <h2 class="text-white d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px">
                            <b><?= $teacher['username'][0] ?></b>
                        </h2>
                    </div>
                    <?php
                    }
                    ?>
                    <span style="padding-left: 15px;"><?= $teacher['username'] ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <a
                        href="../../controllers/teach/remove.user.in.class.controller.php?user_id=<?= $teacher['user_id'] ?>&classroom_id=<?= $id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" color='red' fill="currentColor"
                            class="bi bi-trash3 mr-2" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                        </svg>
                    </a>
                    <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $teacher['email'] ?>&tf=1"
                        target="_blank" class='d-flex align-items-center justify-content-end w-60'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16 ">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="container card col-8 mt-3 shadow-sm">
        <div>
            <div class="d-flex flex-row justify-content-between">
                <p style="font-size: 35px;">Students</p>
                <div class="d-flex">
                    <p style="font-size: 20px; padding-top: 16px;"><?= $studentNumber . " students" ?></p>
                    <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                        aria-controls="multiCollapseExample1">
                        <i class="fa fa-user-plus" style="font-size: 20px; padding-top: 20px; padding-left: 15px; "></i>
                    </a>
                </div>
            </div>
            <div class="row " style="width: 900px; ">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center"
                            style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                            <div class="bg-white p-3 col-xl-6 " style="width:35%; height:60vh;">
                                <form
                                    action="../../controllers/email/email.controller.php?classroom_id=<?= $_GET['classroom_id'] ?>"
                                    method="post" enctype="multipart/form-data">
                                    <p class="mt-1 mb-4 border-bottom">Invite students</p>
                                    <div class="text-success mt-1 mb-4">
                                    </div>
                                    <input type="email" class="form-control mt-5" name="email"
                                        placeholder="Type an email">
                                    <div class="d-flex justify-content-end" style="margin-top: 95px;">
                                        <a href="" class="btn btn-light">cancel</a>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top">
            <?php foreach ($students as $student) { ?>
            <div class="d-flex align-items-center mt-4 mb-2 mr-1 justify-content-between">
                <div class="d-flex justify-content-center align-items-center">
                    <div>
                        <?php
                        if (!empty($student['profile'])){    
                        ?>
                        <img class="rounded-circle" src="assets/images/profile/<?= $student['profile'] ?>" alt="avatar"
                            style="height: 50px;">
                        <?php
                        }else{
                        ?>
                        <div class="bg-primary rounded-circle">
                            <h2 class="text-white d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px">
                                <b><?= $user[1][0] ?></b>
                            </h2>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <span style="padding-left: 15px;"><?= $student["username"] ?></span>
                </div>
                <div class="d-flex align-items-center">
                    <a
                        href="../../controllers/teach/remove.user.in.class.controller.php?user_id=<?= $student['user_id'] ?>&classroom_id=<?= $id ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" color='red' fill="currentColor"
                            class="bi bi-trash3 mr-2" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                        </svg>
                    </a>
                    <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $student['email'] ?>&tf=1"
                        target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16 "
                            class='d-flex align-items-center ml-4 justify-content-end pr-5 w-60'>
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>