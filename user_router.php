<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/home' => 'controllers/home/home.controller.php',
    '/calendar' => 'controllers/calendar/calendar.controller.php',
    '/todo' => 'controllers/todo/todo.controller.php',
    '/teach' => 'controllers/teach/teach.controller.php',
    '/enrollment' => 'controllers/enrollment/enrollment.controller.php',
    '/join-class' => 'controllers/classroom/join_classroom.controller.php',
    '/create-class' => 'controllers/classroom/create_classroom.controller.php',
    '/change-banner-class' => 'controllers/classroom/change_banner.controller.php',
];
if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require "./layouts/user_layouts/header.php";
require "./layouts/user_layouts/navbar.php";
require './'.$page;
require "./layouts/user_layouts/footer.php";