<?php
use Core\Database;
use Core\Images;

$db = new Database();
$getImages = new Images();

$images = $getImages->allImages();

$frontAds = $db->findAll("SELECT * FROM ads  WHERE position= 'front'  ORDER BY starts_at asc");
$mobileAds = $db->findAll("SELECT * FROM ads WHERE position= 'mobile'  ORDER BY starts_at asc");
$slideAds = $db->findAll("SELECT * FROM ads  WHERE position= 'slide' ORDER BY starts_at asc");

date_default_timezone_set('America/Sao_Paulo');

$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');



$parsed_url = parse_url($_SERVER['REQUEST_URI']);
parse_str($parsed_url['query'], $errors);

require view("/admin/ads.php", [
    "frontAds" => $frontAds,
    "mobileAds" => $mobileAds,
    "slideAds" => $slideAds,
    "minTime" => $minTime,
    "images" => $images,
    "errors" => strlen($parsed_url["query"]) > 0 ? $errors : false


]);