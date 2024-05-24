<?php
use Core\CreateSlug;

$id = (int) $_GET["id"];

$config = require ("Database/Config.php");
date_default_timezone_set('America/Sao_Paulo');

$createSlug = new CreateSlug();
$db = new Database($config);
$images = $db->query("SELECT * FROM images")->fetchAll();
$post = $db->query("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE p.id=$id")->fetch();
$title = $post["title"];
$content = $post["content"];
$section = $post["section"];
$post_at = $post["post_at"];
$image_id = $post["image_id"];
$imagePost = $post["image"];


$scheduled = (new DateTime(date("Y-m-d h:i ", $post["post_at"])))->format('Y-m-d\TH:i');

$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

$isDateTimeDisabled = date('m/d/Y h:i:s a', time()) < date("Y-m-d h:i ", $post_at);



require "views/admin/edit.php";