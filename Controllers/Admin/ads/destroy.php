<?php

use Core\Database;

$db = new Database();


if ($_POST["deleteAdId"]) {
    $id = $_POST["deleteAdId"];
    $result = $db->delete("DELETE FROM ads WHERE id=$id");
    header('Location: ' . "/admin/ads");
}