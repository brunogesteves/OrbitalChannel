<?php
require "database/Database.php";

$config = require "database/config.php";

$db = new Database($config);
$id = $_GET["id"];
$query = "select * from posts where id = ?";

$allPosts = $db->query($query, $id)->fetchAll();

require "partials/topleft.php";