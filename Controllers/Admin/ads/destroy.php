<?php
$config = require ("Database/Config.php");
$db = new Database($config);


if ($_POST["deleteAdId"]) {
    $id = $_POST["deleteAdId"];
    $result = $db->query("DELETE FROM ads WHERE id=$id");
    header('Location: ' . "/admin");
}