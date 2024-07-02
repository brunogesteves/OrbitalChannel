<?php

use Core\Database;
use Core\Coin;

$stock = new Coin();
$db = new Database();
date_default_timezone_set('America/Sao_Paulo');

$timeNow =strtotime( date('m/d/Y h:i:s a', time()));
$originalPosts = $db->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id ORDER BY p.post_at asc");
$extposts = $db->findAll("SELECT * FROM extposts");
$autoposts = $db->findAll("SELECT * FROM autoposts");


$adsFront = $db->findAll("SELECT link, file FROM ads WHERE position='front' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsSlide = $db->findAll("SELECT link, file FROM ads WHERE position='slide' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsMobile = $db->findAll("SELECT link, file FROM ads WHERE position='mobile' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");


$level1 = [];
$level2 = [];
$level3 = [];
$level4 = [];

for ($x = 0; $x <= sizeof($autoposts); $x++) {    
    if ($autoposts[$x]["status"] == "on" ){
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
}

for ($x = 0; $x <= sizeof($originalPosts); $x++) {    
    if ($originalPosts[$x]["status"] == "on") {
        if($originalPosts[$x]["section"] === "n1" && sizeof($level1)<=4){
            array_push($level1, $originalPosts[$x]);
        }else if($originalPosts[$x]["section"] === "n2" && sizeof($level2)<=4){
            array_push($level2, $originalPosts[$x]);
        }else if($originalPosts[$x]["section"] === "n3" && sizeof($level3)<=9){
            array_push($level3, $originalPosts[$x]);
        }else if($originalPosts[$x]["section"] === "n4" && sizeof($level4)<=7){
            array_push($level4, $originalPosts[$x]);
        }
    }
}

for ($x = 0; $x <= sizeof($extposts); $x++) {
        if($extposts[$x]["section"] === "n1" && sizeof($level1)<=4){
            array_push($level1, $extposts[$x]);
        }else if($extposts[$x]["section"] === "n2" && sizeof($level1)<=4){
            array_push($level2, $extposts[$x]);
        }else if($extposts[$x]["section"] === "n3" && sizeof($level3)<=9){
            array_push($level3, $extposts[$x]);
        }else if($extposts[$x]["section"] === "n4" && sizeof($level4)<=7){
            array_push($level4, $extposts[$x]);
        }
}



require view("index.php", [
    "posts1" => $level1,
    "posts2" => $level2,
    "posts3" => $level3,
    "posts4" => $level4,
    "adsFront" => $adsFront,
    "adsSlide" =>$adsSlide,
    "adsMobile" =>$adsMobile,
    "stock"=>$stock->index("USD", "BRL")
]);