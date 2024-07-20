<?php
require __DIR__ . "/src/routes/Router.php";

$router = new Router();

$router->addRoute('/SIGEFO/', 'webapp/views/publico/FormacionDocente.php');
$router->addRoute('/SIGEFO/login', 'webapp/login.php');
$router->addRoute('/SIGEFO/perfil', 'webapp/perfil.php');
$router->addRoute('/SIGEFO/informacion', 'webapp/views/publico/info.php');


$router->dispatch();
