<?php

use Core\Database;

$db = new Database();


if ($_POST["statusId"]) {
    $id = $_POST["statusId"];
    $result = $db->delete("UPDATE ads SET status='on' WHERE id=$id");
    header('Location: ' . "/admin/ads");
}