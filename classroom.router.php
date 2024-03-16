<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/create-assignment' => 'controllers/teach/assignment/create.assignment.controller.php',
    '/update-assignment' => 'controllers/teach/assignment/update.assign.controller.php',
    '/create-material' => 'controllers/teach/material/create.material/create.material.form.controller.php',
    '/update-material' => 'controllers/teach/material/update.material/goto.form.update.material.controller.php',
    
];
if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require $page;