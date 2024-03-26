<?php
session_start();
if (empty(isset($_SESSION['user']))) {
    header("Location: /");
    exit;
}
require_once "database/database.php";
require_once "models/classroom/get.user.model.php";
require_once "models/classroom/select.classrooms.model.php";
require_once "models/classroom/select.classroom.model.php";
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$item = [
    'home' => "",
    'calendar' => "",
    'enrollment' => "",
    'teach' => "",
    'view-assigned' => "",
    'archive' => "",
];
if ($uri == "/home") {
    $item['home'] = "bg-light";
} else if ($uri == "/archive") {
    $item['archive'] = "bg-light";
} else if ($uri == "/view-assigned") {
    $item['view-assigned'] = "bg-light";
}
?>
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark  accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <img src="../../assets/images/logo.svg" class="sidebar-brand-text mx-4" style="width: 150px;">
        <!-- <div class=" text-primary">E-Classroom</div> -->
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider border-dark">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  ">
        <a class="nav-link rounded-0 <?= $item['home'] ?>" href="/home">
            <i class='fas fa-home text-dark'></i>
            <span style='font-size: 17px;' class="text-dark"><b>Home</b></span>
        </a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item ">
        <a class="nav-link rounded-0" href="/calendar">
            <i class='far fa-calendar-alt text-dark' ​​></i>
            <span style='font-size: 17px' class="text-dark"><b>Calendar</b></span>
        </a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link rounded-0 <?= $item['view-assigned'] ?>" href="/view-assigned">
            <i class='fas fa-book text-dark'></i>
            <span style='font-size: 17px' class="text-dark"><b>To do</b></span>
        </a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed " href="/#" data-toggle="collapse" data-target="#listTeach" aria-expanded="true" aria-controls="listTeach">
            <i class='fas fa-chalkboard-teacher text-dark'></i>
            <span style='font-size: 17px' class="text-dark"><b>Teaching</b></span>
        </a>
        <div id="listTeach" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <?php
                $email = $_SESSION['user'][1];
                $user = getUser($email);
                $user_id = $user[0];
                $profileName = $user[4];
                $classroom = getClassroomsUnarchive($user_id);
                foreach ($classroom as $class) {
                ?>
                    <a class="collapse-item" href="../../controllers/teach/steam/class.controller.php?classroom_id=<?= $class['classroom_id'] ?>"><?= $class['classroom_name'] ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/#" data-toggle="collapse" data-target="#listenroll" aria-expanded="true" aria-controls="listenroll">
            <i class='fas fa-chalkboard-teacher text-dark'></i>
            <span style="font-size: 17px" class="text-dark"><b>Enrollment</b></span>
        </a>
        <div id="listenroll" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <?php
                $classroom = getClasses($user_id);
                foreach ($classroom as $class) {
                ?>
                    <a class="collapse-item" href="../../controllers/enrollment/steam/enrollment.controller.php?classroom_id=<?= $class[0] ?>"><?= $class[1] ?></a>
                <?php  } ?>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link rounded-0 <?= $item['archive'] ?>" href="/archive">
            <i class='fas fa-archive text-dark'></i>
            <span style="font-size: 17px" class="text-dark"><b>Archive</b></span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider bg-dark d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border" style="background-color: gray;" id="sidebarToggle"></button>
    </div>
</ul>
<!-- Content Wrapper -->
</div>
<div id="content-wrapper " class=" d-flex border-left border-dark flex-column col-10 " style="background: #FFFFFE;">
    <div class="d-flex justify-content-end flex-column">
        <div class="d-flex align-items-center 
            <?php
            if (empty($class_title)) {
                echo ' justify-content-between';
            } else {
                echo ' justify-content-end';
            }
            ?>
                mt-2">
            <div class=''>
                <?php
                if (!empty($_SESSION['classroom_id'])) {
                    $classroom = getAnClass($_SESSION['classroom_id']);
                    $class_title = $classroom[0][1];
                    if (
                        urlIs('/steam-teacher') ||
                        urlIs('/classwork-teacher') ||
                        urlIs('/people-teacher') ||
                        urlIs('/grade-teacher') ||
                        urlIs("/student-work") ||
                        urlIs('/create-assignment') ||
                        urlIs("/update-assignment")  ||
                        urlIs('/update-material') ||
                        urlIs('/create-material')
                    ) {
                ?>
                        <a href="../../../controllers/teach/steam/class.controller.php?classroom_id=<?= $_SESSION['classroom_id'] ?>" class="" data-toggle="tooltip" data-placement="top" title="Back to Stream">
                            <p class="text-primary h5 text-decoration-none ml-1 mt-3"><b><?= $class_title ?></b></p>
                        </a>
                    <?php
                    } else if (
                        urlIs("/view-student-work") ||
                        urlIs("/view-assigned") ||
                        urlIs("/view-missing") ||
                        urlIs("/instruction-assignment") ||
                        urlIs("/student-view-material") ||
                        urlIs('/steam-student') ||
                        urlIs('/classwork-student') ||
                        urlIs('/people-student') ||
                        urlIs('/grade-student') ||
                        urlIs("/view-instruction-material") ||
                        urlIs("/view-instruction-assignment")
                    ) {
                    ?>
                        <a href="../../../controllers/enrollment/steam/enrollment.controller.php?classroom_id=<?= $_SESSION['classroom_id'] ?>" class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="Back to Stream">
                            <p class="text-primary h5 ml-1 mt-3 text-decoration-none " style=" width: 200px">
                                <b><?= $class_title ?></b>
                            </p>
                        </a>
                <?php
                    }
                }
                ?>
            </div>
            <div>
                <div class="text-right">
                    <img type="button" src="assets/images/profile/<?= $profileName ?>" data-toggle="modal" data-target="#profileView" style="width: 50px; height: 50px; border-radius: 50%;">
                </div>
                <div class="modal fade" id="profileView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="avatar d-flex me-3 m-1 justify-content-center align-items-center">
                                    <img class="rounded-circle" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="width: 100px; height: 100px; border-radius: 50%;">
                                </div>
                                <div class="d-flex flex-column  p-3">
                                    <div class=''>
                                        <p class="h6 text-dark mb-2 btn dropdown-item bg-light-soft-hover" href="#">
                                            <b>Name :
                                                <?= $_SESSION['user'][0] ?></b>
                                        </p>
                                        <p class="text-dark m-0 mb-2 btn dropdown-item bg-light-soft-hover">
                                            <b>Email :
                                                <?= $_SESSION['user'][1] ?></b>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <form action="../../controllers/user/update.profile.php" method="POST" enctype="multipart/form-data">
                                    <input type="file" name="file" id="profileUpload" onchange="form.submit()" style="display: none;">

                                    <a href="#" class="text-white p-2 btn bg-primary dropdown-item " onclick="$(' #profileUpload').trigger('click'); return false;">Update
                                        Profile</a>
                                </form>
                                <a class="btn bg-danger text-white" href="/signout"><i class="fas fa-fw fa-sign-out-alt"></i>Sign
                                    Out</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>