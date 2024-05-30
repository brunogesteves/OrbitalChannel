<?php


use Core\Database;

$db = new Database();



$fileName = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$fileSize = $_FILES["image"]['size'];
$fileError = $_FILES["image"]['error'];
$target = "images/" . $fileName;

if ($fileError === 0 && $fileSize > 0) {
    if (file_exists($target)) {
        var_dump("file existe");
        $separateFilename = explode('.', $target);
        $ext = $separateFilename[1];
        $target = $separateFilename[0] . "(1)." . $ext;
    }
}
if (move_uploaded_file($tempName, $target)) {
    $db->insert('INSERT INTO images(name) VALUES(:fileName)', [
        "fileName" => $fileName
    ]);

}

header("Location:" . "/admin/imagens");

