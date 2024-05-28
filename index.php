<?php



require "public/index.php";



spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("Core/" . $class . '.php');
});








