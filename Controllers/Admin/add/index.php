<?php

// require "Core/getImages.php";
use Core\GetImages;

$config = require ("Database/Config.php");
$db = new Database($config);
$images = $db->query("SELECT * FROM images")->fetchAll();



// $allImages = new GetImages();
// $images = $getImages->index("SELECT * FROM ads images");

// var_dump(sizeof($images));

$dtMinTime = new DateTime(date('m/d/Y h:i:s a', time()));
$minTime = $dtMinTime->format('Y-m-d\TH:i');

require "views/admin/add.php";