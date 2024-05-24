<?php


$config = require ("Database/Config.php");

$db = new Database($config);
$images = $db->query("select * from images")->fetchAll();
$countries = require ("Components/languages.php");
// var_dump($_SERVER);
$dtMinTime = new DateTime(date('m/d/Y h:i:s a', time()));
$minTime = $dtMinTime->format('Y-m-d\TH:i');


$parsed_url = parse_url($_SERVER['REQUEST_URI']);
parse_str($parsed_url['query'], $results);



require "views/admin/search.php";