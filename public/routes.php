<?php

$router->get("/", "Controllers/index.php");
$router->get("/admin", "Controllers/Admin/index.php")->only("auth");
$router->post("/admin/update", "Controllers/Admin/create.php");
$router->put("/admin/update", "Controllers/Admin/update.php");
$router->delete("/admin/destroy", "Controllers/Admin/destroy.php");

$router->get("/admin/adicionar", "Controllers/Admin/add/index.php");
$router->post("/admin/adicionar/create", "Controllers/Admin/add/create.php");

$router->get("/admin/procurar", "Controllers/Admin/search/index.php");
$router->post("/admin/procurar/search", "Controllers/Admin/search/search.php");

$router->get("/admin/editar", "Controllers/Admin/edit/index.php");
$router->put("/admin/editar/update", "Controllers/Admin/edit/update.php");

$router->get("/admin/ads", "Controllers/Admin/ads/index.php");
$router->post("/admin/ads/create", "Controllers/Admin/ads/create.php");
$router->put("/admin/ads/update", "Controllers/Admin/ads/update.php");
$router->put("/admin/ads/publish", "Controllers/Admin/ads/publish.php");
$router->delete("/admin/ads/destroy", "Controllers/Admin/ads/destroy.php");

$router->get("/admin/imagens", "Controllers/Admin/images/index.php");
$router->post("/admin/imagens/create", "Controllers/Admin/images/create.php");
$router->delete("/admin/imagens/destroy", "Controllers/Admin/images/destroy.php");

$router->get("/login", "Controllers/login/index.php");

$router->post("/session/store", "Session/store.php");
$router->delete("/session/delete", "Session/destroy.php")->only("auth");





