<?php

use Core\Slug;
use Core\Database;

$createSlug = new Slug();
$db = new Database();


$errors = [];
$tempContent = [];

$id = trim($_POST["id"]);
$title = trim($_POST["title"]);
$link = "";
$content = trim($_POST["content"]);
$section = $_POST["section"];
$source = "Orbital Channel";
$slug = trim($createSlug->create($_POST["title"]));
$post_at = $_POST["post_at"] == NULL ? strtotime($_POST["new_post_at"]) : $_POST["post_at"];
$image_id = (int) $_POST["image_id"];

if (strlen($title) == 0) {
    $errors["title"] = "Digite um Título";
}else{
    $tempContent["title"] = $title;
}
if ($post_at == false) {
    $errors["date"] = "Escolha uma data";
}else{
    $tempContent["date"] = $title;
} 
if ($image_id == 0) {
    $errors["thumb"] = "Escolha um Thumb";
}else{
    $tempContent["thumb"] = $title;
}
if (strlen($content) == 0) {
    $errors["content"] = "Crie o conteúdo";
}else{
    $tempContent["content"] = $title;
}

if (empty($errors)) {
    

    $result = $db->update("UPDATE posts SET 
        title='$title',
        link='$link',
        content='$content',
        section='$section',
        source='$source',
        slug='$slug',
        post_at= $post_at,
        image_id=$image_id 
        WHERE id=$id");    


    if ($result) {
        header('Location: ' . "/admin/editar?id=$id");
    }

}else {
    $_SESSION["errors"]=$errors;
    $_SESSION["tempContent"]=$tempContent;
    header('Location: ' . "/admin/editar?id=$id");
}

