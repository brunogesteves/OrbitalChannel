<?php


use Core\Database;

$db = new Database();


var_dump("delete inicio");
$imageId = $_POST["imageId"];
$db->delete('delete from images WHERE id=:id', [
    "id" => $imageId
]);

header("Location:" . "/admin/imagens");
