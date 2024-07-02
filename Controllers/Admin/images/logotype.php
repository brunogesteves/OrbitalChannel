<?php


    
    $fileName = $_FILES["newLogotypeImage"]["name"];
    $tempName = $_FILES["newLogotypeImage"]["tmp_name"];
    $target = "images/orbital/logo.png";

    if (move_uploaded_file($tempName, $target)) {            
        header('Location: ' . "/admin");        
    }