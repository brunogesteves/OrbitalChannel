<?php

use Core\Database;

$db = new Database();


if ($_POST["statusId"]) {
    $id = $_POST["statusId"];
    $status = $_POST["recentStatus"];
    $result = $db->update("UPDATE ads SET status='$status' WHERE id=$id");
    header('Location: ' . "/admin/ads");
}