<?php

use Core\Database;
use Core\Images;

$db = new Database();
$getImages = new Images();

$images = $getImages->allImages();
$posts = $db->findAll("select p.*, i.name as image from posts p inner join images i on i.id = p.image_id ORDER BY p.post_at asc");
$extposts = $db->findAll("select * from extposts");

require view("/admin/index.php", [
    "images" => $images,
    "posts" => $posts,
    "extposts" => $extposts
]);