<?php
use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';


spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require "{$class}.php";
});


$router = new Router();
$routes = require ("routes.php");

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$router->route($uri, $method);