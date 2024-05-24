<?php
require ("../Database/Database.php");
$config = require ("../Database/Config.php");

$db = new Database($config);
$images = $db->query("select * from images")->fetchAll();
// var_dump($images);



header("Content-Type: application/json");

// $res = $GalleryApi->getGallery();

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


