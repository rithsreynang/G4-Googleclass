<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canlender</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>E - CLASSROOM</title>
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Custom styles for this template-->
    <link href="../../vendor/custom/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<?php
require_once "../../database/database.php";
require_once "../../models/classroom/get.user.model.php";
require_once "../../models/classroom/select.classrooms.model.php";
?>
<!-- Sidebar -->

<body>
    <div class="d-flex">
        <div class="col-4">
            <ul class="navbar-nav">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                    <div class=" mx-4 text-primary">E-Classroom</div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item  p-2">
                    <a class="nav-link rounded-0" href="/home">
                        <i class='fas fa-home text-dark'></i>
                        <span style='font-size: 17px;' class="text-dark"><b>Home</b></span>
                    </a>
                </li>
                <!-- Nav Item - Charts -->
                <li class="nav-item ">
                    <a class="nav-link rounded-0 bg-light" href="../../controllers/calendar/calendar.controller.php">
                        <i class='far fa-calendar-alt text-dark' ​​></i>
                        <span style='font-size: 17px' class="text-dark"><b>Calendar</b></span>
                    </a>
                </li>
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link rounded-0" href="/todo">
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
                                <a class="collapse-item" href="../../controllers/teach/class.controller.php?classroom_id=<?= $class['classroom_id'] ?>"><?= $class['classroom_name'] ?> </a>
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
                                <a class="collapse-item" href="../../controllers/enrollment/enrollment.controller.php?classroom_id=<?= $class[0] ?>"><?= $class[1] ?></a>
                            <?php  } ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" href="/archive">
                        <i class='fas fa-archive text-dark'></i>
                        <span style="font-size: 17px" class="text-dark"><b>Archive</b></span>
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- Content Wrapper -->
        </div>
        <div id="content-wrapper" class="d-flex flex-column col-8 bg-light">
            <div class="d-flex justify-content flex-column">
                <div class="d-flex justify-content-end align-items-center m-3">
                    <div class="navbar  navbar-expand-lg p-1 h-1" style="height: 30px;">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="avatar-img rounded-circle" src="../../assets/images/profile/<?= $profileName ?>" alt="avatar" style="width: 50px; ">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right pt-3" aria-labelledby="navbarDropdownProfile" style="background: #040720; margin-top: 30px;">
                                    <ul style="list-style: none; width: 250px; height: 200px; background: white;" class="p-2">
                                        <li>
                                            <div class="d-flex align-items-center flex-column">
                                                <!-- Avatar -->
                                                <div class="avatar me-3 mr-1">
                                                    <img class="avatar-img rounded-circle shadow" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="width: 50px;">
                                                </div>
                                                <div>
                                                    <p class="h6 text-center" href="#"><?= $_SESSION['user'][0] ?></p>
                                                    <p class="small h5 m-0"><?= $_SESSION['user'][1] ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        <!-- Links -->
                                        <li><a class="dropdown-item bg-danger-soft-hover" href="../../views/user/edit.profile.view.php">
                                        <li><i class="fas fa-fw fa-user mr-2"></i>Edit Profile</a></li>
                                        <li><a class="dropdown-item bg-danger-soft-hover" href="/signout"><i class="fas fa-fw fa-sign-out-alt mr-2"></i>Sign Out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End of Topbar -->

                <div class="container">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            dayClick: function(date, allDay, jsEvent, view) {
                var formattedDate = date.toString().replace(" GMT+0000", "");
                alert(formattedDate);
            },
            scrollTime: '07:00:00',
            defaultView: 'agendaWeek',
            header: {
                left: ' prev',
                center: 'title',
                right: ' next',
            },
            buttonText: {
                week: 'Week',
                today: 'Today',
                day: 'Day',
                month: 'Month',
                list: 'List',
            },
        });
    })
</script>