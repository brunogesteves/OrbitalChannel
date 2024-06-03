<?php

use Core\Database;

$db = new Database();

$ads = $db->findAll("SELECT * FROM ads ORDER BY starts_at asc");

date_default_timezone_set('America/Sao_Paulo');

$dtMinTime = new DateTime(date('m/d/Y h:i:s a', time()));
$minTime = $dtMinTime->format('Y-m-d\TH:i');




$errorsUpdate = [];

if (strlen($name) == 0) {
    $errorsUpdate["adName"] = "Digite o Nome do Anúncio";
}

if ($position == "none") {
    $errorsUpdate["adPosition"] = "Selecione uma posição";
}
if (strlen($link) == 0) {
    $errorsUpdate["adLink"] = "Digite o Link";
}
if ($starts_at == false) {
    $errorsUpdate["adStarts_at"] = "Selecione Data Inicial";
}

if ($finishs_at == false) {
    $errorsUpdate["adFinishs_at"] = "Selecione Data Final";

}

if ($finishs_at < $starts_at) {
    $errors["adFinalDate"] = "Data Final é maior que data Inicial";
}


$id = (int) $_POST["updateAdId"];
$name = $_POST["adName"];
$position = $_POST["adPosition"];
$status = "off";
$file = $_POST["adName"];
$link = $_POST["adLink"];
$starts_at = strtotime($_POST["adStarts_at"]);
$finishs_at = strtotime($_POST["adFinishs_at"]);



if ((strlen($_FILES["adUpdateFileUpload"]["name"]) != 0)) {


    $fileName = $_FILES["adUpdateFileUpload"]["name"];
    $tempName = $_FILES["adUpdateFileUpload"]["tmp_name"];
    $fileSize = $_FILES["adUpdateFileUpload"]['size'];
    $fileError = $_FILES["adUpdateFileUpload"]['error'];

    $separateFilename = explode('.', $fileName);
    $ext = $separateFilename[1];
    $target = "images/ads/" . $_POST["adName"] . "." . $ext;

    $file = $file . "." . $ext;
    $result = $db->insert("UPDATE ads SET
            name = '$name',
            position = '$position',
            status = '$status',
        file = '$file',
            link = '$link',
            starts_at = $starts_at,
            finishs_at = $finishs_at
            WHERE id=$id");

    if ($result) {
        if (move_uploaded_file($tempName, $target)) {
            header('Location: ' . "/admin/ads");
        }
    }
} else {
    $result = $db->insert("UPDATE ads SET
    name = '$name',
    position = '$position',
    status = '$status',
    link = '$link',
    starts_at = $starts_at,
    finishs_at = $finishs_at
    WHERE id=$id");

    if ($result) {
        header('Location: ' . "/admin/ads");

    }

}