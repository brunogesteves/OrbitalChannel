<?php

$uri = parse_url(str_replace("orbital/", "", $_SERVER['REQUEST_URI']))['path'];
$slug = str_replace("/", "", $uri);
// $slug = "veja-os-melhores-ralis-do-brasil-na-liga-das-nacoes-e-vote-em-seu-preferido";

$config = require ("Database/Config.php");

$db = new Database($config);
$post = $db->query("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE slug='$slug'")->fetch();
$extpost = $db->query("SELECT * FROM extposts WHERE slug='$slug'")->fetch();
$morePosts = $db->query("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id ORDER BY RAND() LIMIT 3")->fetchAll();

// echo "<pre>";

// var_dump($post);
// var_dump($content["image"]);
// var_dump($morePosts[2]["image"]);
// echo "</pre>";

if (empty($post) && empty($extpost)) {
    require "views/abort.php";

} else {
    if (!empty($post)) {
        $content = $post;

    }
    if (!empty($extpost)) {
        $content = $extpost;

    }

    require "views/post.php";
}
