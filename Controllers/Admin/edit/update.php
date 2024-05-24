<?php

use Core\CreateSlug;

$createSlug = new CreateSlug();
$config = require ("Database/Config.php");
$db = new Database($config);




$id = trim($_POST["id"]);
$title = trim($_POST["title"]);
$link = "";
$content = trim($_POST["content"]);
$section = $_POST["section"];
$source = "Orbital Channel";
$slug = trim($createSlug->index($_POST["title"]));
$status = "off";
$post_at = (int) $_POST["post_at"];
$image_id = (int) $_POST["image_id"];


// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
if (strlen($title) == 0) {
    $errors["title"] = "Digite um Título";
}
if ($post_at) {
    $errors["date"] = "Escolha uma data";
}
if ($image_id == 0) {
    $errors["thumb"] = "Escolha um Thumb";
}
if (strlen($content) == 0) {
    $errors["content"] = "Crie o conteúdo";
}

// echo "<pre>";
// var_dump($_POST);
// var_dump($id);
// echo "</pre>";

if (empty($errors)) {
    $result = $db->query("UPDATE posts SET 
        title='$title',
        link='$link',
        content='$content',
        section='$section',
        source='$source',
        slug='$slug',
        status='$status',
        post_at= $post_at,
        image_id=$image_id 
        WHERE id=$id");


    if ($result) {
        // var_dump("parou aqui");
        header('Location: ' . "/admin/editar?id=$id");
    }

} else {
    require "views/admin/edit.php";

}

