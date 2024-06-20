<?php



use Core\Database;
use Core\Coin;

$stock = new Coin();
$source = new Database();
date_default_timezone_set('America/Sao_Paulo');

$timeNow =strtotime( date('m/d/Y h:i:s a', time()));

$postsN1 = $source->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE section = 'n1' AND status = 'on'");
$postsN2 = $source->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE section = 'n2' AND status = 'on'");
$postsN3 = $source->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE section = 'n3' AND status = 'on' ");
$postsN4 = $source->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE section = 'n4' AND status = 'on'");

$extpostsN1 = $source->findAll("SELECT * FROM extposts WHERE section = 'n1' AND status = 'on'");
$extpostsN2 = $source->findAll("SELECT * FROM extposts WHERE section = 'n2' AND status = 'on'");
$extpostsN3 = $source->findAll("SELECT * FROM extposts WHERE section = 'n3' AND status = 'on'");
$extpostsN4 = $source->findAll("SELECT * FROM extposts WHERE section = 'n4' AND status = 'on'");

$autopostsN1 = $source->findAll("SELECT * FROM autoposts WHERE section = 'n1'");
$autopostsN2 = $source->findAll("SELECT * FROM autoposts WHERE section = 'n2'");
$autopostsN3 = $source->findAll("SELECT * FROM autoposts WHERE section = 'n3'");
$autopostsN4 = $source->findAll("SELECT * FROM autoposts WHERE section = 'n4'");

$adsFront = $source->findAll("SELECT link, file FROM ads WHERE position= 'front' AND (starts_at <=$timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsSlide = $source->findAll("SELECT link, file FROM ads WHERE position= 'slide' AND (starts_at <=$timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsMobile = $source->findAll("SELECT link, file FROM ads WHERE position= 'mobile' AND (starts_at <=$timeNow AND finishs_at >= $timeNow) AND status= 'on'");




$level1 = [];
$level2 = [];
$level3 = [];
$level4 = [];


for ($x = 0; $x <= sizeof($postsN1); $x++) {
    if ($postsN1[$x] != NULL) {
        array_push($level1, $postsN1[$x]);
    }
}

for ($x = 0; $x <= sizeof($extpostsN1); $x++) {
    if ($extpostsN1[$x] != NULL) {
        array_push($level1, $extpostsN1[$x]);
    }
}

for ($x = 0; $x <= sizeof($autopostsN1); $x++) {
    if ($autopostsN1[$x] != NULL) {
        array_push($level1, $autopostsN1[$x]);

    }
}

for ($x = 0; $x <= sizeof($postsN2); $x++) {
    if ($postsN2[$x] != NULL) {
        array_push($level2, $postsN2[$x]);
    }
}
for ($x = 0; $x <= sizeof($extpostsN2); $x++) {
    if ($extpostsN2[$x] != NULL) {
        array_push($level2, $extpostsN2[$x]);
    }
}
for ($x = 0; $x <= sizeof($autopostsN2); $x++) {
    if ($autopostsN2[$x] != NULL) {
        array_push($level2, $autopostsN2[$x]);

    }
}

for ($x = 0; $x <= sizeof($postsN3); $x++) {
    if ($postsN3[$x] != NULL) {
        array_push($level3, $postsN3[$x]);
    }
}
for ($x = 0; $x <= sizeof($extpostsN3); $x++) {
    if ($extpostsN3[$x] != NULL) {
        array_push($level3, $extpostsN3[$x]);
    }
}
for ($x = 0; $x <= sizeof($autopostsN3); $x++) {
    if ($autopostsN3[$x] != NULL) {
        array_push($level3, $autopostsN3[$x]);
    }
}


for ($x = 0; $x <= sizeof($postsN4); $x++) {
    if ($postsN4[$x] != NULL) {
        array_push($level4, $postsN4[$x]);
    }
}
for ($x = 0; $x <= sizeof($extpostsN4); $x++) {
    if ($extpostsN4[$x] != NULL) {
        array_push($level4, $extpostsN4[$x]);
    }
}
for ($x = 0; $x <= sizeof($autopostsN4); $x++) {
    if ($autopostsN4[$x] != NULL) {
        array_push($level4, $autopostsN4[$x]);
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