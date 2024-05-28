<?php

use Core\Database;

$db = new Database();

if ($_POST["getUniqueId"] > 0) {
    $id = (int) $_POST['getUniqueId'];
    // var_dump($_POST);
    $uniqueAd = $db->find("SELECT * FROM ads WHERE id=$id");
    array_push($uniqueAd, $id);

    $res = http_build_query($uniqueAd);

    // $openModalIsValid = true;

    header('Location: ' . "/admin/ads?=$res");

}