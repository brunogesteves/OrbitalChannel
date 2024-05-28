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



if (strlen($title) == 0) {
    $errors["title"] = "Digite um Título";
}
if ($post_at == false) {
    $errors["date"] = "Escolha uma data";
}
if ($image_id == 0) {
    $errors["thumb"] = "Escolha um Thumb";
}
if (strlen($content) == 0) {
    $errors["content"] = "Crie o conteúdo";
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
        // $lastId = $result->fetchColumn();
        header('Location: ' . "/admin/editar?id=$lastId");

    }
} else {
    require "views/admin/add.php";

}

