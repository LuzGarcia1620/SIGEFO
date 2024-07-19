<?php
require __DIR__ . "/src/routes/Router.php";

$router = new Router();

$router->addRoute('/SIGEFO/', 'webapp/login.php');
$router->addRoute('/SIGEFO/perfil', 'webapp/perfil.php');

$router->dispatch();
