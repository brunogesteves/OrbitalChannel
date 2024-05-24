<?php
$config = require ("Database/Config.php");
$db = new Database($config);
$images = $db->query("select * from images")->fetchAll();

$posts = $db->query("select p.*, i.name as image from posts p inner join images i on i.id = p.image_id ORDER BY p.post_at asc")->fetchAll();
$extposts = $db->query("select * from extposts")->fetchAll();


require "views/admin/index.php";