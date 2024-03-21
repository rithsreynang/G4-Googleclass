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
    'todo' => "",
    'archive' => "",
];
if ($uri == "/home") {
    $item['home'] = "bg-light";
} else if ($uri == "/archive") {
    $item['archive'] = "bg-light";
} else if ($uri == "/todo") {
    $item['todo'] = "bg-light";
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
        <a class="nav-link rounded-0 <?= $item['todo'] ?>" href="/todo">
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
<div id="content-wrapper " class="d-flex border-left shadow-sm flex-column col-10" style="background: #FFFFFE;">
    <div class="d-flex justify-content-end flex-column">
        <div class="d-flex justify-content-between align-items-center m-3">
            <?php
            if (!empty($_SESSION['classroom_id'])) {
                $classroom = getAnClass($_SESSION['classroom_id']);
                $class_title = $classroom[0][1];
                if (
                    urlIs('/steam-teacher') ||
                    urlIs('/classwork-teacher') ||
                    urlIs('/people-teacher') ||
                    urlIs('/grade-teacher') ||
                    urlIs("/instruction-assignment") ||
                    urlIs("/student-work") ||
                    urlIs("/view-instruction-material") ||
                    urlIs("/view-instruction-assignment") ||
                    urlIs('/create-assignment') ||
                    urlIs("/update-assignment")  ||
                    urlIs('/update-material') ||
                    urlIs('/create-material')
                ) {
            ?>
                    <a href="../../../controllers/teach/steam/class.controller.php?classroom_id=<?= $_SESSION['classroom_id'] ?>" class="btn" data-toggle="tooltip" data-placement="top" title="Back to Stream">
                        <p class="text-dark h5 " style="margin-left: -25px;"><b><i class="bi bi-chevron-compact-left"></i><?= $class_title ?> </b></p>
                    </a>
                <?php
                } else if (
                    urlIs("/view-student-work") ||
                    urlIs("/view-assigned") ||
                    urlIs("/view-missing") ||
                    urlIs("/student-view-material") ||
                    urlIs('/steam-student') ||
                    urlIs('/classwork-student') ||
                    urlIs('/people-student') ||
                    urlIs('/grade-student')
                ) {
                ?>
                    <a href="../../../controllers/enrollment/steam/enrollment.controller.php?classroom_id=<?= $_SESSION['classroom_id'] ?>" data-toggle="tooltip" data-placement="top" title="Back to Stream">
                        <h5>
                            <?= $class_title ?>
                        </h5>
                    </a>
            <?php
                }
            }
            ?>
            <div class="navbar   navbar-expand-lg p-1 h-1" style="height: 30px;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if (!empty($profileName)) {
                            ?>
                                <img class="rounded-circle" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="height: 50px;">
                            <?php
                            } else {
                            ?>
                                <div class="bg-primary rounded-circle mt-4">
                                    <h2 class="text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px">
                                        <b><?= $user[1][0] ?></b>
                                    </h2>
                                </div>
                            <?php
                            }
                            ?>
                        </a>
                        <div class=" dropdown-menu dropdown-menu-right p-1 shadow-sm" aria-labelledby="navbarDropdownProfile">
                            <ul class=" nav navbar bg-light d-flex justify-content-center">
                                <li>
                                    <div class="d-flex flex-column justify-content-center align-items-center" style="width: 150px;">
                                        <!-- Avatar -->
                                        <div class="avatar me-3 m-1">
                                            <?php
                                            if (!empty($profileName)) {
                                            ?>
                                                <img class="rounded-circle" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="height: 50px;">
                                            <?php
                                            } else {
                                            ?>
                                                <div class="bg-primary rounded-circle">
                                                    <h2 class="text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px">
                                                        <b><?= $user[1][0] ?></b>
                                                    </h2>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div>
                                            <p class="h6 text-center" href="#"><?= $_SESSION['user'][0] ?></p>
                                            <p class=" m-0"><?= $_SESSION['user'][1] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                </li>
                                <!-- Links -->
                                <li><a type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-user bg-light-soft-hover shadow"></i>Update
                                        profile</a>
                                </li>
                                <li><a class="dropdown-item bg-danger text-white rounded" href="/signout"><i class="fas fa-fw fa-sign-out-alt"></i>Sign Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="../../controllers/user/update.profile.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-white">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <?php
                                        if (!empty($profileName)) {
                                        ?>
                                            <img class="rounded-circle" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="height: 50px;">
                                        <?php
                                        } else {
                                        ?>
                                            <div class="bg-primary rounded-circle">
                                                <h2 class="text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 45px">
                                                    <b><?= $user[1][0] ?></b>
                                                </h2>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class='m-3'>
                                        <input type="file" class="form-control m-1" name="file" placeholder="Choose image">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Topbar -->
        </div>