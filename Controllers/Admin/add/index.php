<?php

use Core\Images;



$getImages = new Images();

$images = $getImages->allImages();
$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

$errors = is_array($_SESSION["errors"]) ? $_SESSION["errors"] : false;
$tempContent = is_array($_SESSION["tempContent"]) ? $_SESSION["tempContent"] : false;

$_SESSION["errors"] = [];
$_SESSION["tempContent"] = [];

require view("/admin/add.php", [
    "images" => $images,
    "minTime" => $minTime,
    "errors" => $errors,
    "tempContent" => $tempContent
]);
