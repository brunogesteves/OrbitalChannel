<?php
use Core\Database;

$db = new Database();

$ads = $db->findAll("SELECT * FROM ads ORDER BY starts_at asc");

date_default_timezone_set('America/Sao_Paulo');

$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');


$parsed_url = parse_url($_SERVER['REQUEST_URI']);
parse_str($parsed_url['query'], $uniqueAd);
if ($uniqueAd) {
    $openModalIsValid = true;

}


require view("/admin/ads.php", [
    "ads" => $ads,
    "minTime" => $minTime
]);