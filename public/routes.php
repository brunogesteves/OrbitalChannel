<?php

$router->get("/", "Controllers/index.php");
$router->get("/comingsoon", "Controllers/comingsoon.php");
$router->get("/admin", "Controllers/Admin/index.php")->only("auth");
$router->post("/admin/create", "Controllers/Admin/create.php")->only("auth");
$router->put("/admin/update", "Controllers/Admin/update.php")->only("auth");
$router->delete("/admin/destroy", "Controllers/Admin/destroy.php")->only("auth");

$router->get("/admin/adicionar", "Controllers/Admin/add/index.php")->only("auth");
$router->post("/admin/adicionar/create", "Controllers/Admin/add/create.php")->only("auth");

$router->get("/admin/procurar", "Controllers/Admin/search/index.php")->only("auth");
$router->post("/admin/procurar/search", "Controllers/Admin/search/search.php")->only("auth");
$router->post("/admin/procurar/addthirdparty", "Controllers/Admin/search/addthirdparty.php")->only("auth");

$router->get("/admin/editar", "Controllers/Admin/edit/index.php")->only("auth");
$router->put("/admin/editar/update", "Controllers/Admin/edit/update.php")->only("auth");

$router->get("/admin/ads", "Controllers/Admin/ads/index.php")->only("auth");
$router->post("/admin/ads/create", "Controllers/Admin/ads/create.php")->only("auth");
$router->put("/admin/ads/update", "Controllers/Admin/ads/update.php")->only("auth");
$router->put("/admin/ads/publish", "Controllers/Admin/ads/publish.php")->only("auth");
$router->delete("/admin/ads/destroy", "Controllers/Admin/ads/destroy.php")->only("auth");

$router->get("/admin/imagens", "Controllers/Admin/images/index.php")->only("auth");
$router->post("/admin/imagens/create", "Controllers/Admin/images/create.php")->only("auth");
$router->put("/admin/imagens/logotype", "Controllers/Admin/images/logotype.php")->only("auth");
$router->delete("/admin/imagens/destroy", "Controllers/Admin/images/destroy.php")->only("auth");

$router->get("/login", "Controllers/login/index.php");
$router->post("/session/store", "Session/store.php");
$router->delete("/session/delete", "Session/destroy.php");