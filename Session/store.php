<?php

use Core\Database;

$db = new Database();

$email = $_POST["email"];
$password = $_POST["password"];

$user = $db->findUser("select * from users where email = :email", [
    "email" => $email
]);

if ($user) {
    if ($password == $user["password"]) {

        login([
            "email" => $email
        ]);
        header("location: /admin");
    } else {
        require view("login.php", [
            "warning" => "Senha Errada"
        ]);
    }
}

// var_dump($user);
if (!$user) {
    require view("login.php", [
        "warning" => "Email Inexistente"
    ]);
}