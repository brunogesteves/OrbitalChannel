<?php

$uri = parse_url(str_replace("orbital/", "", $_SERVER['REQUEST_URI']))['path'];
$slug = str_replace("/", "", $uri);

use Core\Database;

$db = new Database();

$post = $db->find("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE slug='$slug'");
$extpost = $db->find("SELECT * FROM extposts WHERE slug='$slug'");
$morePosts = $db->find("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id ORDER BY RAND() LIMIT 3");



if (empty($post) && empty($extpost)) {
    require view("/abort.php", [
        "post" => $post,
        "extpost" => $extpost,
        "morePosts" => $morePosts
    ]);

} else {
    if (!empty($post)) {
        $content = $post;

    }
    if (!empty($extpost)) {
        $content = $extpost;

    }

    require view("post.php");
}
