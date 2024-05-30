<?php

$id = (int) $_GET["id"];


use Core\Database;
use Core\Images;

$db = new Database();
$getImages = new Images();
date_default_timezone_set('America/Sao_Paulo');

$images = $getImages->allImages();
$post = $db->find("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE p.id=$id");



$scheduled = (new DateTime(date("Y-m-d h:i ", $post["post_at"])))->format('Y-m-d\TH:i');


$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

$isDateTimeDisabled = date('m/d/Y h:i:s a', time()) < date("Y-m-d h:i ", $post_at);



require view("/admin/edit.php", [
    "post" => $post,
    "id" => $id,
    "images" => $images,
    "scheduled" => $scheduled,
    "minTime" => $minTime,
    "isDateTimeDisabled" => $isDateTimeDisabled
]);