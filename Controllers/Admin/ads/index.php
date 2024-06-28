<?php
use Core\Database;
use Core\Images;

$db = new Database();
$getImages = new Images();

$images = $getImages->allImages();

$frontAds = $db->findAll("SELECT * FROM ads  WHERE position= 'front'  ORDER BY starts_at DESC");
$mobileAds = $db->findAll("SELECT * FROM ads WHERE position= 'mobile'  ORDER BY starts_at DESC");
$slideAds = $db->findAll("SELECT * FROM ads  WHERE position= 'slide' ORDER BY starts_at DESC");

date_default_timezone_set('America/Sao_Paulo');
$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

$newAdErrors = is_array($_SESSION["newAdErrors"]) ? $_SESSION["newAdErrors"]:false;
$tempNewAdContent = is_array($_SESSION["tempNewAdContent"]) ? $_SESSION["tempNewAdContent"]:false;
$updateAdErrors = is_array($_SESSION["updateAdErrors"]) ? $_SESSION["updateAdErrors"]:false;

$_SESSION["newAdErrors"]=[];
$_SESSION["tempNewAdContent"]=[];
$_SESSION["updateAdErrors"]=[];

require view("/admin/ads.php", [
    "frontAds" => $frontAds,
    "mobileAds" => $mobileAds,
    "slideAds" => $slideAds,
    "minTime" => $minTime,
    "images" => $images,
    "newAdErrors" =>$newAdErrors,    
    "updateAdErrors" => $updateAdErrors
]);