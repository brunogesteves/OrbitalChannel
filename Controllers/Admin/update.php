<?php




use Core\Database;

$db = new Database();

if ($_POST["logotype"]) {
    $logotype = $_POST["logotype"];
    $sourceImage = 'images/' . $_POST["logotype"];
    copy($sourceImage, "images/logo.jpg");
}

if ($_POST["UpdateStatusId"]) {
    $id = (int) $_POST["UpdateStatusId"];
    $status = $_POST["status"];


    $result = $db->update("UPDATE posts SET status='$status' WHERE id=$id");
    header('Location: ' . "/admin");
}


if ($_POST["ExtPostStatusId"]) {
    $id = $_POST["ExtPostStatusId"];
    $status = $_POST["status"];

    $result = $db->update("UPDATE extposts SET status='$status' WHERE id=$id");
    header('Location: ' . "/admin");
}



if ($_POST["sectionUpdateExtPostId"]) {
    $section = $_POST["sectionUpdateExtPost"];
    $id = (int) $_POST["sectionUpdateExtPostId"];
    $result = $db->update("UPDATE extposts SET section='$section' WHERE id=$id");
    header('Location: ' . "/admin");
}