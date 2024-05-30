<?php


use Core\Database;

$db = new Database();
$images = $db->findAll("select * from images");


require view("/admin/images.php", [
    "images" => $images
]);