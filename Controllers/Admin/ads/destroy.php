<?php

use Core\Database;

$db = new Database();


if ($_POST["deleteAdId"]) {
    $id = $_POST["deleteAdId"];
    $name = $_POST["deleteAdname"];
    $result = $db->delete("DELETE FROM ads WHERE id=$id");
    if ($result) {
        $filename = "images/ads/" . $name . ".png";
        if (file_exists($filename)) {
            unlink($filename);
            header('Location: ' . "/admin/ads");
        } else {
            echo "nao";
        }
    }
}
