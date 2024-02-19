
<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/user-signin' => 'controllers/user/signin.controller.php',
    '/user-signup' => 'controllers/user/signup.controller.php',
    '/user-signout' => 'controllers/user/signout.controller.php',
    
];
if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require $page;