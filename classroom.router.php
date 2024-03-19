<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/create-assignment' => 'controllers/teach/assignment/create.assignment/create.assignment.controller.php',
    '/update-assignment' => 'controllers/teach/assignment/update.assignment/update.assign.controller.php',
    '/create-material' => 'controllers/teach/material/create.material/create.material.form.controller.php',
    '/update-material' => 'controllers/teach/material/update.material/goto.form.update.material.controller.php',
    '/change-banner-classroom' => 'controllers/classroom/change.banner/goto.banner.controller.php',
];
if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require $page;