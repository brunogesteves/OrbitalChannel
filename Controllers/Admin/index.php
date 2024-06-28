<?php

use Core\Database;
use Core\Images;


$db = new Database();
$getImages = new Images();

$images = $getImages->allImages();
$originalPosts = $db->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id ORDER BY p.post_at asc");
$extposts = $db->findAll("SELECT * FROM extposts");
$autoposts = $db->findAll("SELECT * FROM autoposts");

$level1 = [];
$level2 = [];
$level3 = [];
$level4 = [];


for ($x = 0; $x <= sizeof($originalPosts); $x++) {
    
    if ($originalPosts[$x]["status"] == "on") {
        if($originalPosts[$x]["section"] === "n1" ){
            array_push($level1, $originalPosts[$x]);
        }else if($originalPosts[$x]["section"] === "n2" ){
            array_push($level2, $originalPosts[$x]);
        }else if($originalPosts[$x]["section"] === "n3" ){
            array_push($level3, $originalPosts[$x]);
        }else if($originalPosts[$x]["section"] === "n4" ){
            array_push($level4, $originalPosts[$x]);
        }
    }
}

for ($x = 0; $x <= sizeof($autoposts); $x++) {
        if($autoposts[$x]["section"] === "n1" ){
            array_push($level1, $autoposts[$x]);
        }else if($autoposts[$x]["section"] === "n2" ){
            array_push($level2, $autoposts[$x]);
        }else if($autoposts[$x]["section"] === "n3" ){
            array_push($level3, $autoposts[$x]);
        }else if($autoposts[$x]["section"] === "n4" ){
            array_push($level4, $autoposts[$x]);
        }
}

for ($x = 0; $x <= sizeof($extposts); $x++) {
    
    if ($extposts[$x]["status"] == "on") {
        if($extposts[$x]["section"] === "n1" ){
            array_push($level1, $extposts[$x]);
        }else if($extposts[$x]["section"] === "n2" ){
            array_push($level2, $extposts[$x]);
        }else if($extposts[$x]["section"] === "n3" ){
            array_push($level3, $extposts[$x]);
        }else if($extposts[$x]["section"] === "n4" ){
            array_push($level4, $extposts[$x]);
        }
    }
}


require view("/admin/index.php", [
    "images" => $images,
    "posts" => $originalPosts,
    "extposts" => $extposts,
    "posts1" => $level1,
    "posts2" => $level2,
    "posts3" => $level3,
    "posts4" => $level4,
    "autoposts" => $autoposts
]);