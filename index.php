<?php
use Core\Router;



require ("Database/Database.php");
require ("Core/functions.php");
include ("public/index.php");
// include ("./Core/Router.php");
// require ("router.php");

// spl_autoload_register(function ($class) {
//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//     require "{$class}.php";
// });

$router = new Router();

$routes = require ("./routes.php");
// $uri = parse_url(str_replace("orbital/", "", $_SERVER['REQUEST_URI']))['path'];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$router->route($uri, $method);




