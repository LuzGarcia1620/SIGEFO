<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="/../webapp/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/../webapp/assets/css/login.css">
    <link rel="stylesheet" href="/../webapp/assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php require __DIR__ . "/../src/controller/auth/AuthController.php";

$authController = new AuthController();
$auth = $authController->handleRequest();
?>
<div>
    <?php include __DIR__ . '/templates/header.html'; ?>
    </div>
    <!-- NavBAR -->
<nav class="dropdownmenu">
    <ul>
        <li><a href="">Inicio</a></li>
        <li><a href="">Evaluación Docente</a>
            <ul id="submenu">
                <li><a href="">Instrumento de evaluacion docente</a></li>
                <li><a href="">Cronograma</a></li>
                <li><a href="">Fechas de aplicación</a></li>
                <li><a href="">Reporte de Resultados</a></li>
                <li><a href="">Monitoreo</a></li>
            </ul>
        </li>
        <li><a href="#">Formación Docente</a>
            <ul id="submenu">
                <li><a href="/SIGEFO/login">Acceso a Plataforma</a></li>
                <li><a href="">Actividades Formativas</a></li>
                <li><a href="">Galería</a></li>
                <li><a href="">Descargar constancia</a></li>
            </ul>
        </li>
        <li><a href="">Documentos de Consulta</a></li>
        <li><a href="">Contacto</a></li>
    </ul>
</nav>
<!-- Fin de la NavBar -->

<div id="container">
    <div class="login-card">
        <div id="left">
            <img src="/../webapp/assets/img/uaem.png" style="width: 50%;"/>
            <span>Departamento de Formación Docente</span>
        </div>
        <div id="right">
            <form id="loginForm" class="form-floating mb-3 input-container"
                  action="/src/controller/auth/AuthController.php" method="post">
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
                        <img id="password_icon" src="/../webapp/assets/img/visibilidad.png" width="20px"/>
                    </button>
                </div>
                <input type="hidden" name="action" value="login">
                <button type="submit" id="btn_login">Iniciar Sesion</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer content -->
<div>
    <?php include __DIR__ . '/templates/footerPublico.html'; ?>
    </div>

<script src="/../webapp/assets/js/bootstrap.bundle.min.js"></script>
<script src="/../webapp/assets/js/login.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>