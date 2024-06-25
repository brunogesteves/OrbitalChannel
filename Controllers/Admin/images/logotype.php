<?php


    $logotype = $_POST["changeLogotype"];
    var_dump($logotype);
    $sourceImage = 'images/' . $_POST["changeLogotype"];
    copy($sourceImage, "images/orbital/logo.png");
    header('Location: ' . "/admin");

