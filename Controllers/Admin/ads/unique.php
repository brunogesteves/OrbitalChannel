<?php
$config = require ("Database/Config.php");
$db = new Database($config);

var_dump($_POST);
if ($_POST["getUniqueId"] > 0) {
    $id = (int) $_POST['getUniqueId'];
    $uniqueAd = $db->query("SELECT * FROM ads WHERE id=$id")->fetch();
    $openModalIsValid = true;
    header('Location: ' . "/admin/ads?=$uniqueAd");

}