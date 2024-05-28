<?php

use Core\Images;



$getImages = new Images();

$images = $getImages->allImages();
$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

require view("/admin/add.php", [
    "images" => $images,
    "minTime" => $minTime

]);