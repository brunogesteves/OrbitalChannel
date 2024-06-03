<?php


use Core\Database;

$db = new Database();


var_dump("delete inicio");
$imageId = (int) $_POST["imageId"];
var_dump("o id é: ", $imageId);
$isDeleted = $db->delete('DELETE FROM images WHERE id=:id', [
    "id" => $imageId
]);

$file = "images/" . $_POST["imageName"];


if ($isDeleted) {
    if (file_exists($file)) {
        unlink($file);
    }
}

header("Location:" . "/admin/imagens");
