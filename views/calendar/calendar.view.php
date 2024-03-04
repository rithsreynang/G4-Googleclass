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

<body id="page-top" class='d-flex'>
    <div id="wrapper" class='nav-left' >
        <?php
        session_start();
        require_once "../../database/database.php";
        require_once "../../models/classroom/get.user.model.php";
        require_once "../../models/classroom/select.classrooms.model.php";
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $email = $_SESSION['user'][1];
        $user = getUser($email);
        $user_id = $user[0];
        $profileName = $user['profile'];
        $classroom = getClassroomsUnarchive($user_id);
        $class_name = "";
        if (isset($_GET['classroom_id'])) {
            $id = $_GET['classroom_id'];
            $class = getClassroom($id);
            $class_name = $class['classroom_name'];
        }
        $item = [
            'home' => [],
            'calendar' => [],
            'enrollment' => [],
            'teach' => [],
            'todo' => [],
            'archive' => [],
        ];
        if ($uri == '/home') {
            $item['home'] = ['#FBFCFC', 'black'];
        } else {
            $item['home'] = ['', ''];
        }
        if ($uri == '/calendar') {
            $item['calendar'] = ['#FBFCFC', 'black'];
        } else {
            $item['calendar'] = ['', ''];
        }
        if ($uri == '/enrollment') {
            $item['enrollment'] = ['#FBFCFC', 'black'];
        } else {
            $item['enrollment'] = ['', ''];
        }
        if ($uri == '/teach') {
            $item['teach'] = ['#FBFCFC', 'black'];
        } else {
            $item['teach'] = ['', ''];
        }
        if ($uri == '/todo') {
            $item['todo'] = ['#FBFCFC', 'black'];
        } else {
            $item['todo'] = ['', ''];
        }
        if ($uri == '/archive') {
            $item['archive'] = ['#FBFCFC', 'black'];
        } else {
            $item['archive'] = ['', ''];
        }

        ?>
        <!-- Sidebar -->
        <ul class="navbar-nav   bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #040720;">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-4">E-Classroom</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item  ">
                <a class="nav-link rounded-0 <?= $item['home'][0] ?>" href="/home">
                    <i class='fas fa-home' style="color: <?= $item['home'][1] ?>"></i>
                    <span style='font-size: 17px;color:<?= $item['home'][1] ?>'>Home</span>
                </a>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item ">
                <a class="nav-link rounded-0 <?= $item['calendar'][0] ?> " href="/calendar">
                    <i class='far fa-calendar-alt' ​​​ style="color: <?= $item['calendar'][1] ?>"></i>
                    <span style='font-size: 17px;color:<?= $item['calendar'][1] ?>'>Calendar</span>
                </a>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link rounded-0 <?= $item['todo'][0] ?>" href="/todo">
                    <i class='fas fa-book' style="color: <?= $item['todo'][1] ?>;"></i>
                    <span style='font-size: 17px; color:<?= $item['todo'][1] ?>'>To do</span>
                </a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item <?= $item['teach'][0] ?>">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#listTeach" aria-expanded="true" aria-controls="listTeach">
                    <i class='fas fa-chalkboard-teacher' style="color: <?= $item['teach'][1] ?>;"></i>
                    <span style='font-size: 17px;color:<?= $item['teach'][1] ?>'>Teaching</span>
                </a>
                <div id="listTeach" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        foreach ($classroom as $class) {
                        ?>
                            <a class="collapse-item" href="../../controllers/teach/class.controller.php?classroom_id=<?= $class['classroom_id'] ?>"> <?= $class['classroom_name'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <li class="nav-item <?= $item['enrollment'][0] ?>">
                <a class="nav-link  <?= $item['enrollment'][0] ?>" href="#" data-toggle="collapse" data-target="#listenroll" aria-expanded="true" aria-controls="listenroll">
                    <i class='fas fa-chalkboard-teacher' style="color: <?= $item['enrollment'][1] ?>;"></i>
                    <span style="font-size: 17px;  color:<?= $item['enrollment'][1] ?>">Enrollment</span>
                </a>
                <div id="listenroll" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        $classes = getClasses($user_id);
                        foreach ($classes as $class) {
                        ?>
                            <a class="collapse-item" href="../../controllers/enrollment/enrollment.controller.php?classroom_id=<?= $class[0] ?>"><?= $class[1] ?></a>
                        <?php  } ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-0" style="background:<?= $item['archive'][0] ?>" href="/archive">
                    <i class='fas fa-archive' style="color: <?= $item['archive'][1] ?>;"></i>
                    <span style="font-size: 17px;  color:<?= $item['archive'][1] ?>">Archive</span>
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
    <div class=" col-xml-12">
        <div id="content-wrapper " class="d-flex flex-column ">
            <div class="d-flex justify-content-end flex-column">
                <div class="d-flex justify-content-between align-items-center m-3">
                    <h2><?= $class_name ?></h2>
                    <div class="navbar  navbar-expand-lg navbar-light p-1 h-1" style="height: 30px;">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="avatar-img rounded-circle" src="../../assets/images/profile/<?= $profileName ?>" alt="avatar" style='height: 60px'>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right pt-3" aria-labelledby="navbarDropdownProfile" style="background: #040720; margin-top: 30px;">
                                    <ul style="list-style: none; width: 250px; height: 200px; background: white;" class="p-2">
                                        <li>
                                            <div class="d-flex align-items-center flex-column">
                                                <!-- Avatar -->
                                                <div class="avatar me-3 mr-1">
                                                    <img class="avatar-img rounded-circle shadow" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="width: 40px;">
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
            </div>
        </div>
        <div class="container">
            <div id="calendar"></div>
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