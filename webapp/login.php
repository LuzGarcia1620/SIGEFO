<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="./Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/login.css">
    <link rel="stylesheet" href="./Assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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
                <img src="./Assets/img/uaem.png" style="width: 50%;" />
                <span>Departamento de Formación Docente</span>
            </div>
            <div id="right">
                <form action="../src/controller/auth/AuthController.php" method="post">
                    <h1>¡Bienvenido!</h1>
                    <p>Inicia sesión</p>
                    <div class="form-floating mb-3 input-container">
                        <label for="usuario">Usuario:</label><br>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario"
                            required><br><br>
                    </div>
                    <div class="form-floating mb-3 input-container position-relative">
                        <label for="password">Contraseña:</label><br>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Contraseña" required><br><br>
                        <button id="show_password" class="btn password-btn" type="button" onclick="mostrarPassword()">
                            <img id="password_icon" src="../../webapp/assets/img/visibilidad.png" width="20px" />
                        </button>
                    </div>
                    <input type="hidden" name="action" value="login">

                    <input type="submit" value="Enviar">
                </form>
                <!-- Footer content -->
                <footer class="sm-custom-footer py-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex flex-column align-items-start mb-2 mb-md-0 follow-us">
                                <h5 class="text-center text-md-start mb-1">¡Síguenos en nuestras redes sociales!</h5>
                                <div class="d-flex justify-content-start follow-us">
                                    <a href="mailto:eval_docente@uaem.mx" class="text-white me-2"><img
                                            src="./Assets/img/correo.png" alt="Correo" class="img-fluid"></a>
                                    <a href="https://www.facebook.com/uaemformaciondocente" class="text-white me-2"><img
                                            src="./Assets/img/facebook.png" alt="Facebook" class="img-fluid"></a>
                                    <a href="https://www.youtube.com/channel/UCvc3SSAArfY-DsWXXZ4mwhg"
                                        class="text-white"><img src="./Assets/img/youtube.png" alt="YouTube"
                                            class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center text-md-start">
                                <div>
                                    <h5 class="mb-1">Universidad Autónoma del Estado de Morelos</h5>
                                    <p class="mb-1">Departamento de Formación Docente</p>
                                    <p class="mb-1"><img src="./Assets/img/mapas-y-banderas.png" alt="ubicacion"
                                            class="img-fluid" style="height: 10px;"> Av. Universidad 1001, Chamilpa,
                                        Cuernavaca, Morelos, México</p>
                                    <p class="mb-1"><img src="./Assets/img/llamada-telefonica.png" alt="telefono"
                                            class="img-fluid" style="height: 10px;"> (777) 329 70 00 Ext. 3249, 3352 y
                                        3935</p>
                                    <p class="mb-1"><img src="./Assets/img/correo-electronico.png" alt="correo"
                                            class="img-fluid" style="height: 10px;"> eval_docente@uaem.mx</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

                <script src="./Assets/js/bootstrap.bundle.min.js"></script>
                <script src="../../webapp/assets/js/login.js"></script>
</body>

</html>