<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/home' => 'controllers/home/home.controller.php',
    '/calendar' => 'controllers/calendar/calendar.controller.php',
    '/todo' => 'controllers/todo/todo.controller.php',
    '/teach' => 'controllers/teach/teach/controller.php',
    '/archive' => 'controllers/archive/archive.class.controller.php',
    '/enrollment' => 'controllers/enrollment/enrollment.controller.php',
    '/join-class' => 'controllers/classroom/join.classroom.controller.php',
    '/create-class' => 'controllers/classroom/create.classroom.controller.php',
    '/steam-teacher' => 'controllers/teach/steam/steam.controller.php',
    '/steam-student' => 'controllers/enrollment/steam/steam.controller.php',
    '/people-teacher' => 'controllers/teach/people/people.controller.php',
    '/people-student' => 'controllers/enrollment/people/goto.people.controller.php',
    '/classwork-teacher' => 'controllers/teach/classwork/classwork.controller.php',
    '/classwork-student' => 'controllers/enrollment/classwork/goto.classwork.controller.php',
    '/grade-teacher' => 'controllers/teach/grade/grades.controller.php',
    '/change-banner-class' => 'controllers/classroom/change.banner.controller.php',
];
if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require "layouts/user/header.php";
require "./layouts/user/navbar.php";
require './'.$page;
require "./layouts/user/footer.php";