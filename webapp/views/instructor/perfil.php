<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/perfil.css" />
    <link rel="stylesheet" href="../../assets/css/styles.css" />
</head>

<body>
<?php
require __DIR__."/../../../src/controller/user/UserController.php";
$userController = new UserController();
$users = $userController->handleRequest();
?>

    <div id="headerContainer"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
        <div class="col-lg-2">
            <div class="navback">
                <ul class="list-unstyled vertical-nav">
                    <li><a href="/webapp/views/instructor/perfil.php" class="btn btn-block my-1 menu">Perfil</a></li>
                    <li><a href="/webapp/views/instructor/formulario.php" class="btn btn-primary btn-block my-1 menu">Formulario</a>
                    </li>
                    <li><a href="/webapp/views/instructor/asistencia.php" class="btn btn-primary btn-block my-1 menu">Asistencia</a>
                    </li>
                    <li><a href="/webapp/views/instructor/materialInstructor.php" class="btn btn-primary btn-block my-1 menu">Material</a>
                    </li>
                    <li><a href="login.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                </ul>
            </div>
        </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10 main-content d-flex justify-content-center align-items-center">
                <div class="custom-card">
                    <div class="card-body">
                        <h1 class="text-center">¡Bienvenido!</h1>
                        <div class="line"></div>
                        <br>
                        <form>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" value="Diego" readonly />
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <input type="text" class="form-control" id="usuario" value="Diego" readonly />
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puesto:</label>
                                <input type="text" class="form-control" id="puesto" value="Instructor" readonly />
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" class="form-control" id="correo" value="diego@gmail.com"
                                    readonly />
                            </div>

                            <div class="form-group">
                                <label for="contraseña">Contraseña:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="contraseña" value="asd123"
                                        readonly />
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="togglePassword('contraseña', this)">
                                            <i class="fa fa-eye"></i>
                                            <img src="../../assets/img/visibilidad.png"
                                                alt="visible" style="width: 20px; height: 20px; margin-left: 5px;">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="newPassword">Nueva contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="newPassword" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                onclick="togglePassword('newPassword', this)">
                                                <i class="fa fa-eye"></i>
                                                <img src="../../assets/img/visibilidad.png"
                                                    alt="Nueva Contraseña Icono"
                                                    style="width: 20px; height: 20px; margin-left: 5px;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="repeatPassword">Repetir contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="repeatPassword" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                onclick="togglePassword('repeatPassword', this)">
                                                <i class="fa fa-eye"></i>
                                                <img src="../../assets/img/visibilidad.png"
                                                    alt="Confirmar Contraseña Icono"
                                                    style="width: 20px; height: 20px; margin-left: 5px;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>Departamento de Formación Docente</p>
        <p>Av. Universidad 1001 Col. Chamilpa C.P. 62209, Cuernavaca, Morelos</p>
    </footer>

    <script>
    function togglePassword(id, element) {
        const input = document.getElementById(id);
        const eyeIcon = element.querySelector("img");

        if (input.type === "password") {
            input.type = "text";
            eyeIcon.src = "../../assets/img/invisible.png";
        } else {
            input.type = "password";
            eyeIcon.src = "../../assets/img/visibilidad.png";
        }
    }

    fetch("../../templates/header.html")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("headerContainer").innerHTML = data;
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>