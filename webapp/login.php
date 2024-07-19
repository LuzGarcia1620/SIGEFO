<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/login.css">
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php
require __DIR__ . "/../src/controller/auth/AuthController.php";

$authController = new AuthController();
$auth = $authController->handleRequest();
?>
<div id="headerContainer"></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Navbar content -->
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./evaluaciondocente.html">Evaluación Docente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./formaciondocente.html">Formación Docente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./documentosconsulta.html">Documentos de Consulta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contacto.html">Contacto</a>
                </li>
            </ul>
            <a class="navbar-brand ms-auto" href="./index.html">UAEM</a>
        </div>
    </div>
</nav>
<div id="container">
    <div class="login-card">
        <div id="left">
            <img src="/SIGEFO/webapp/assets/img/uaem.png" style="width: 50%;"/>
            <span>Departamento de Formación Docente</span>
        </div>
        <div id="right">
            <form id="loginForm" class="form-floating mb-3 input-container"
                  action="C:/xampp/htdocs/SIGEFO/src/controller/auth/AuthController.php" method="post">
                <div>
                    <h1>¡Bienvenido!</h1>
                    <p>Inicia sesión</p>
                    <div class="input-field">
                        <input required="" autocomplete="off" type="text" name="usuario" id="username"/>
                        <label for="username">Usuario</label>
                    </div>
                    <div class="input-field">
                        <input required="" autocomplete="off" type="password" name="password" id="password"/>
                        <label for="password">Contraseña</label>
                    </div>
                    <button id="show_password" class="btn password-btn" type="button" onclick="mostrarPassword()">
                        <img id="password_icon" src="/SIGEFO/webapp/assets/img/visibilidad.png" width="20px"/>
                    </button>
                </div>
                <input type="hidden" name="action" value="login">
                <button type="submit" class="arrow-wrapper" id="btn_login">Iniciar Sesion</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer content -->
<footer class="sm-custom-footer py-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 d-flex flex-column align-items-start mb-2 mb-md-0 follow-us">
                <h5 class="text-center text-md-start mb-1">¡Síguenos en nuestras redes sociales!</h5>
                <div class="d-flex justify-content-start follow-us">
                    <a href="mailto:eval_docente@uaem.mx" class="text-white me-2"><img
                                src="../webapp/assets/img/correo.png" alt="Correo" class="img-fluid"></a>
                    <a href="https://www.facebook.com/uaemformaciondocente" class="text-white me-2"><img
                                src="../webapp/assets/img/facebook.png" alt="Facebook" class="img-fluid"></a>
                    <a href="https://www.youtube.com/channel/UCvc3SSAArfY-DsWXXZ4mwhg" class="text-white"><img
                                src="../webapp/assets/img/youtube.png" alt="YouTube" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-12 col-md-6 text-center text-md-start">
                <h5 class="mb-1">Universidad Autónoma del Estado de Morelos</h5>
                <p class="mb-1">Departamento de Formación Docente</p>
                <p class="mb-1"><img src="/SIGEFO/webapp/assets/img/mapas-y-banderas.png" alt="ubicacion"
                                     class="img-fluid" style="height: 10px;"> Av. Universidad 1001, Chamilpa,
                    Cuernavaca, Morelos, México</p>
                <p class="mb-1"><img src="/SIGEFO/webapp/assets/img/llamada-telefonica.png" alt="telefono"
                                     class="img-fluid" style="height: 10px;"> (777) 329 70 00 Ext. 3249, 3352 y
                    3935</p>
                <p class="mb-1"><img src="/SIGEFO/webapp/assets/img/correo-electronico.png" alt="correo"
                                     class="img-fluid" style="height: 10px;"> eval_docente@uaem.mx</p>
            </div>
</footer>

<script src="/SIGEFO/webapp/assets/js/bootstrap.bundle.min.js"></script>
<script src="/SIGEFO/webapp/assets/js/login.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>