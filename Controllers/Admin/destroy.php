<?php
$config = require ("Database/Config.php");
$db = new Database($config);

if ($_POST["deletePostId"]) {
    $id = $_POST["deletePostId"];
    $result = $db->query("DELETE FROM posts WHERE id=$id");
    header('Location: ' . "/admin");
}

if ($_POST["DeleteExtPostId"]) {
    $id = $_POST["DeleteExtPostId"];
    $result = $db->query("DELETE FROM extposts WHERE id=$id");
    header('Location: ' . "/admin");
}