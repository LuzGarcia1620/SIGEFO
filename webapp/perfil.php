<?php
session_start();
require dirname(__DIR__) .  '/src/service/user/UserService.php';

$userService = new UserService();
$user = $userService->getOne($_SESSION['idUsuario'])
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/perfil.css" />
</head>

<body>
    <div>
        <?php include __DIR__ . '/templates/header.html'; ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <div class="col-md-2 d-none d-md-block bg-light">
                        <?php if ($user['rol'] == 'SuperAdmin'|| $user['rol'] == 'Admin'): ?>
                        <?php include __DIR__ . '/templates/menuSuperAdmin.php'; ?>
                        <?php elseif ($user['rol'] == 'Instructor'): ?>
                        <?php include __DIR__ . '/templates/menuInstructor.php'; ?>
                        <?php endif; ?>
            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10 main-content">
                <div class="custom-card">
                    <div class="card-body">
                        <h1 class="text-center">¡Hola, <?php echo $user['nombre']; ?>!</h1>
                        <div class="line"></div>
                        <br>
                        <form>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre"
                                    value="<?php echo $user['nombre'] . " " . $user['paterno'] . " " . $user['materno']; ?>"
                                    readonly />
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <input type="text" class="form-control" id="usuario"
                                    value="<?php echo $user['usuario']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puesto:</label>
                                <input type="text" class="form-control" id="puesto" value="<?php echo $user['rol']; ?>"
                                    readonly />
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" class="form-control" id="correo"
                                    value="<?php echo $user['correo']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Contraseña:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="contraseña"
                                        value="<?php echo $user['password'] ?>" readonly />
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="togglePassword('contraseña', this)">
                                            <i class="fa fa-eye"></i>
                                            <img src="/SIGEFO/webapp/assets/img/visibilidad.png" alt="visible"
                                                style="width: 20px; height: 20px; margin-left: 5px;">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-container">
                                <div class="form-group">
                                    <label for="newPassword">Nueva contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="newPassword" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                onclick="togglePassword('newPassword', this)">
                                                <i class="fa fa-eye"></i>
                                                <img src="/SIGEFO/webapp/assets/img/visibilidad.png"
                                                    alt="Nueva Contraseña Icono"
                                                    style="width: 20px; height: 20px; margin-left: 5px;">

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="repeatPassword">Repetir contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="repeatPassword" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                onclick="togglePassword('repeatPassword', this)">
                                                <i class="fa fa-eye"></i>
                                                <img src="/SIGEFO/webapp/assets/img/visibilidad.png"
                                                    alt="Confirmar Contraseña Icono"
                                                    style="width: 20px; height: 20px; margin-left: 5px;">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div>
            <?php include __DIR__ . '/templates/footer.html' ?>
        </div>
    </div>

    <script>
    function togglePassword(id, element) {
        const input = document.getElementById(id);
        const eyeIcon = element.querySelector("img");

        if (input.type === "password") {
            input.type = "text";
            eyeIcon.src = "/SIGEFO/webapp/assets/img/invisible.png";
        } else {
            input.type = "password";
            eyeIcon.src = "/SIGEFO/webapp/assets/img/visibilidad.png";
        }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>