<?php


use Core\Database;

$source = new Database();

// SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE slug='$slug'"
$level1 = $source->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE section = 'n1' ");
$level2 = $source->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE section = 'n2' ");
$level3 = $source->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE section = 'n3' ");
$level4 = $source->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE section = 'n4' ");

require view("index.php", [
    "posts1" => $level1,
    "posts2" => $level2,
    "posts3" => $level3,
    "posts4" => $level4
]);