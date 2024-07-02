<?php
use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


date_default_timezone_set('America/Sao_Paulo');

$dtMinTime = new DateTime(date('m/d/Y h:i:s a', time()));
$minTime = $dtMinTime->format('Y-m-d\TH:i');

$title = trim($_POST["title"]);
$link = "";
$content = trim($_POST["content"]);
$section = $_POST["section"];
$source = "Orbital Channel";
$slug = trim($createSlug->create($_POST["title"]));
$status = "off";
$post_at = $_POST["post_at"];
$image_id = (int) $_POST["image_id"];

$tempContent = [];

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

    $result = $db->insert('INSERT INTO posts(title , link , content , section , source, slug , status ,post_at ,image_id )
                          VALUES(:title , :link , :content , :section , :source, :slug , :status ,:post_at ,:image_id)', [
        "title" => $title,
        "link" => $link,
        "content" => $content,
        "section" => $section,
        "source" => $source,
        "slug" => $slug,
        "status" => $status,
        "post_at" => strtotime($post_at),
        "image_id" => $image_id
    ]);
    if ($result) {
        $lastId = $db->lastId("SELECT LAST_INSERT_ID()");
        $_SESSION["errors"] = [];
        header('Location: ' . "/admin/editar?id=$lastId");

    }
} else {
    $_SESSION["errors"]=$errors;
    $_SESSION["tempContent"]=$tempContent;
    header('Location: ' . "/admin/adicionar");
}

    