<?php

use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


$title = trim($_POST["title"]);
$link = $_POST["link"];
$content = trim($_POST["content"]);
$section = $_POST["section"];
$source = $_POST["source"];
$slug = trim($createSlug->create($_POST["title"]));
$status = "off";
$post_at = strtotime($_POST["post_at"]);
$image = $_POST["image"];

$result = $db->insert('INSERT INTO extposts(title, link, content, section, source, slug, status, post_at, image )
                        VALUES(:title, :link, :content, :section, :source, :slug, :status, :post_at, :image)', [
    "title" => $title,
    "link" => $link,
    "content" => $content,
    "section" => $section,
    "source" => $source,
    "slug" => $slug,
    "status" => $status,
    "post_at" => $post_at,
    "image" => $image
]);
if ($result) {
    header('Location: ' . "/admin");
    die();

} 