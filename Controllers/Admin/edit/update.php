<?php

use Core\Slug;
use Core\Database;

$createSlug = new Slug();
$db = new Database();


$errors = [];


$id = trim($_POST["id"]);
$title = trim($_POST["title"]);
$link = "";
$content = trim($_POST["content"]);
$section = $_POST["section"];
$source = "Orbital Channel";
$slug = trim($createSlug->create($_POST["title"]));
$status = "off";
$post_at = $_POST["post_at"] == NULL ? strtotime($_POST["new_post_at"]) : $_POST["post_at"];
$image_id = (int) $_POST["image_id"];



if (strlen($title) == 0) {
    $errors["title"] = "Digite um Título";
}

if (empty($errors)) {
    echo "<pre>";

    var_dump("entrou db");
    // var_dump("title: " . $title);
    // var_dump("link: " . $link);
    // var_dump("content: " . $content);
    // var_dump("section: " . $section);
    // var_dump("source: " . $source);
    // var_dump("slug: " . $slug);
    // var_dump("status: " . $status);
    // var_dump($_POST["post_at"]);
    // var_dump($_POST["new_post_at"]);
    // var_dump($post_at);
    // var_dump("image_id: " . $image_id);
    // var_dump("id: " . $id);
    // echo "</pre>";

    var_dump(strlen($content) = "");
    // $result = $db->update("UPDATE posts SET 
    //     title='$title',
    //     link='$link',
    //     content='$content',
    //     section='$section',
    //     source='$source',
    //     slug='$slug',
    //     status='$status',
    //     post_at= $post_at,
    //     image_id=$image_id 
    //     WHERE id=$id");


    if ($result) {
        header('Location: ' . "/admin/editar?id=$id");
    }

}

