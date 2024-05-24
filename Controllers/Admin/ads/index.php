<?php
$config = require ("Database/Config.php");
$db = new Database($config);
$ads = $db->query("SELECT * FROM ads ORDER BY starts_at asc")->fetchAll();

date_default_timezone_set('America/Sao_Paulo');

$dtMinTime = new DateTime(date('m/d/Y h:i:s a', time()));
$minTime = $dtMinTime->format('Y-m-d\TH:i');





require "views/admin/ads.php";