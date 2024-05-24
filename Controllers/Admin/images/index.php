<?php

$config = require ("Database/Config.php");
$db = new Database($config);
$images = $db->query("select * from images")->fetchAll();


if ($_SERVER['REQUEST_METHOD'] == "POST") {


    if (isset($_POST["imageId"])) {
        $imageId = $_POST["imageId"];
        $db->query('delete from images WHERE id=:id', [
            "id" => $imageId
        ]);
    } else if ($_FILES) {

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
            $db->query('INSERT INTO images(name) VALUES(:fileName)', [
                "fileName" => $fileName
            ]);

        }
    }
    header('Location: ' . $_SERVER['PHP_SELF']);


}

require "views/admin/images.php";