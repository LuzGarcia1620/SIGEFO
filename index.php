<?php
require __DIR__ . "/src/routes/Router.php";

$router = new Router();
/*INICIO*/
$router->addRoute('/SIGEFO/', 'webapp/views/publico/FormacionDocente.php');
$router->addRoute('/SIGEFO/login', 'webapp/login.php');
$router->addRoute('/SIGEFO/perfil', 'webapp/perfil.php');
/*Publico*/
$router->addRoute('/SIGEFO/informacion', 'webapp/views/publico/info.php');
$router->addRoute('/SIGEFO/registro', 'webapp/views/publico/registro.php');
/*SuperAdmin*/
$router->addRoute('/SIGEFO/actividades', 'webapp/views/superadmin/actividades.php');
$router->addRoute('/SIGEFO/usuarios', 'webapp/views/superadmin/usuarios.php');
$router->addRoute('/SIGEFO/consultas', 'webapp/views/superadmin/consultas.php');
$router->addRoute('/SIGEFO/controlasistencia', 'webapp/views/superadmin/asistencia.php');
/*Instructor*/
$router->addRoute('/SIGEFO/formulario', 'webapp/views/instructor/formulario.php');
$router->addRoute('/SIGEFO/cotejo', 'webapp/views/instructor/asistencia.php');
$router->addRoute('/SIGEFO/material', 'webapp/views/instructor/materialInstructor.php');

$router->dispatch();
