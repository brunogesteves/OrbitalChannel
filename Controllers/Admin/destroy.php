<?php

use Core\Database;

$db = new Database();


if ($_POST["deletePostId"]) {
    $id = $_POST["deletePostId"];
    $result = (int) $db->delete("DELETE FROM posts WHERE id=$id");
    header('Location: ' . "/admin");
}

if ($_POST["DeleteExtPostId"]) {
var_dump("ok-destroy");
    $id = (int) $_POST["DeleteExtPostId"];
var_dump("delete: ", $_POST["DeleteExtPostId"]);
    $result = $db->delete("DELETE FROM extposts WHERE id=$id");
    header('Location: ' . "/admin");
}