<?php

use Core\Database;

$db = new Database();
$images = $db->findAll("select * from images");




header("Content-Type: application/json");


$list = [];

$myObj = new stdClass();
$myObj->statusCode = 200;

foreach ($images as $image) {

    array_push($list, [
        "src" => $urlbase . "./../images/" . $image["name"],
        "name" => $image["name"]
    ]);


}
$myObj->result = $list;
echo json_encode($myObj, JSON_UNESCAPED_SLASHES);


