<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/usuarios.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
<?php
require __DIR__ . "/../../../src/controller/user/UserController.php";
require __DIR__ . "/../../../src/controller/rol/RolController.php";

$userController = new UserController();
$users = $userController->handleRequest();

$rolController = new RolController();
$roles = $rolController->handleRequest();
?>
<div id="headerContainer"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <ul class="list-unstyled vertical-nav">
                <li><a href="perfil.php" class="btn btn-block my-1 menu">Perfil</a></li>
                <li><a href="/webapp/views/superadmin/actividades.php"
                       class="btn btn-primary btn-block my-1 menu">Actividad Formativa</a></li>
                <li><a href="/webapp/views/superadmin/usuarios.php"
                       class="btn btn-primary btn-block my-1 menu">Usuarios</a></li>
                <li><a href="/webapp/views/superadmin/consultas.php"
                       class="btn btn-primary btn-block my-1 menu">Consultas</a></li>
                <li><a href="/webapp/views/superadmin/asistencia.php"
                       class="btn btn-primary btn-block my-1 menu">Asistencia</a></li>
                <li><a href="login.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
            </ul>
        </div>

        <div class="col-lg-10 min mv-10">
            <br>
            <div class="botones">
                <div class="titulo">Usuarios</div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="group">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path
                                        d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                </path>
                            </g>
                        </svg>
                        <input id="buscarInput" placeholder="Buscar" type="text" class="input">
                    </div>
                    <img src="../../assets/img/anadir.png" alt="Agregar Usuarios" id="agregarUserBtn"
                         class="img-fluid" style="cursor: pointer; width: 70px;">
                </div>
            </div>

            <div>
                <div class="divider-line"></div>
                <div class="card-container d-flex justify-content-around flex-wrap">
                    <?php foreach ($users as $user): ?>
                        <div class="card my-2" style="width: 18rem;" data-id="<?php echo $user['idusuario']; ?>" data-status="<?php echo $user['status']; ?>">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $user['nombre'] . ' ' . $user['paterno'] . ' ' . $user['materno'] ?>
                                </h5>
                                <p class="card-text">Usuario: <?php echo $user['usuario'] ?> </p>
                                <p class="card-text">Correo: <?php echo $user['correo'] ?></p>
                                <p class="card-text">Rol: <?php echo $user['rol'] ?></p>
                                <div class="buttons">
                                    <div class="button-container">
                                        <button type="button" class="button edit-btn buttonUpdate">Editar</button>
                                    </div>
                                    <div class="button-container">
                                        <form method="post" id="changeUserForm"
                                              action="/src/controller/user/UserController.php">
                                            <input type="hidden" name="action" value="change">
                                            <input type="hidden" id="idUsuarioC" name="idUsuario">
                                            <button type="button" class="button deactivate-btn buttonDisable">
                                                <?php echo $user['status'] == 1 ? 'Desactivar' : 'Activar'; ?>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="button-container">
                                        <form method="post" id="deleteUserForm"
                                              action="/src/controller/user/UserController.php">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" id="idUsuarioE" name="idUsuario">
                                            <button type="button" class="button delete-btn buttonErase">Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar usuarios -->
    <div class="modal fade" id="agregarUsuariosModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm" action="/src/controller/user/UserController.php" method="post">
                        <div class="campo">
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                            <label for="nombre">Nombre(s)</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control"
                                   required>
                            <label for="apellidoPaterno">Apellido Paterno</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control"
                                   required>
                            <label for="apellidoMaterno">Apellido Materno</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="usuario" name="usuario" class="form-control" required>
                            <label for="usuario">Usuario</label>
                        </div>
                        <div class="campo">
                            <input type="email" id="correo" name="correo" class="form-control" required>
                            <label for="correo">Correo Electrónico</label>
                        </div>
                        <div class="campo">
                            <input type="password" id="password" name="password" class="form-control" required>
                            <label for="password">Contraseña</label>
                        </div>
                        <div class="campo">
                            <select id="rol" name="rol" class="form-control" required>
                                <?php foreach ($roles as $rol): ?>
                                    <option value="<?php echo $rol['id'] ?>">
                                        <?php echo $rol['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <label for="rol">Rol</label>
                        </div>
                        <input type="hidden" name="action" value="save">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar usuarios -->
    <div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editarUsuarioForm" action="/src/controller/user/UserController.php" method="post">
                        <div class="campo">
                            <input type="text" id="nombreEditar" name="nombreEditar" class="form-control" required>
                            <label for="nombreEditar">Nombre</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="apellidoPaternoEditar" name="apellidoPaternoEditar"
                                   class="form-control" required>
                            <label for="apellidoPaternoEditar">Apellido Paterno</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="apellidoMaternoEditar" name="apellidoMaternoEditar"
                                   class="form-control" required>
                            <label for="apellidoMaternoEditar">Apellido Materno</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="usuarioEditar" name="usuarioEditar" class="form-control" required>
                            <label for="usuarioEditar">Usuario</label>
                        </div>
                        <div class="campo">
                            <input type="email" id="correoEditar" name="correoEditar" class="form-control" required>
                            <label for="correoEditar">Correo Electrónico</label>
                        </div>
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" id="idUsuarioU" name="idUsuario">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btnUpdate">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <p>Departamento de Formación Docente</p>
        <p>Av. Universidad 1001 Col. Chamilpa C.P. 62209, Cuernavaca, Morelos</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../assets/js/usuarios.js"></script>

    <script>
        fetch("../../templates/header.html")
            .then(response => response.text())
            .then(data => {
                document.getElementById("headerContainer").innerHTML = data;
            });
    </script>
</div>
</body>

</html>