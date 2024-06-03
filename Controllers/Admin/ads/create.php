<?php

use Core\Database;


$db = new Database();

date_default_timezone_set('America/Sao_Paulo');

$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

$errors = [];
$name = $_POST["adName"];
$position = $_POST["adPosition"];
$status = "off";
$file = $_POST["adName"];
$link = $_POST["adLink"];
$starts_at = strtotime($_POST["adStarts_at"]);
$finishs_at = strtotime($_POST["adFinishs_at"]);






if ($position == "none") {
    $errors["adPosition"] = "Selecione uma posição";
}
if (strlen($link) == 0) {
    $errors["adLink"] = "Digite o Link";
}
if ($starts_at == false) {
    $errors["adStarts_at"] = "Selecione Data Inicial";
}

if ($finishs_at == false) {
    $errors["adFinishs_at"] = "Selecione Data Final";
}

if (strlen($name) == 0) {
    $errors["adName"] = "Digite o Link";
}

if ($finishs_at < $starts_at) {
    $errors["adFinalDate"] = "Data Final é maior que data Inicial";
}

if (empty($errors)) {
    $fileName = $_FILES["adFile"]["name"];
    $tempName = $_FILES["adFile"]["tmp_name"];
    $fileSize = $_FILES["adFile"]['size'];
    $fileError = $_FILES["adFile"]['error'];


    $separateFilename = explode('.', $fileName);
    $ext = $separateFilename[1];
    $target = "images/ads/" . $file . "." . $ext;

    $file = $file . "." . $ext;
    $result = $db->insert('INSERT INTO ads(name, position, status, file, link, starts_at, finishs_at)
            VALUES(:name, :position, :status, :file, :link, :starts_at, :finishs_at)', [
        "name" => $name,
        "position" => $position,
        "status" => $status,
        "file" => $file,
        "link" => $link,
        "starts_at" => $starts_at,
        "finishs_at" => $finishs_at
    ]);
    if ($result) {
        if (move_uploaded_file($tempName, $target)) {
            header('Location: ' . "/admin/ads");

        }
    }
} else {
    $errors = http_build_query($errors);
    header('Location: ' . "/admin/ads?$errors");



}
