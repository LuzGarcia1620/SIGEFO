<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Asistencia</title>
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/asistencia.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
</head>

<body>
    <?php
        require_once __DIR__ . "/../../../src/controller/activity/ActivityController.php";
        require_once __DIR__ . "/../../../src/service/activity/ActivityService.php";

        $activityController = new ActivityController();
        $actividades = $activityController->handleRequest();
        $actividades = isset($actividades) ? $actividades : array();

        $activityService = new ActivityService();
    ?>
    <div>
        <?php include __DIR__ . '/../../templates/header.html'; ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="">
                    <?php include __DIR__ . '/../../templates/menuSuperAdmin.php'; ?>
                </div>
            </nav>

            <!-- Contenido Principal -->
            <div class=" col-lg-10 ">
                <div class="titulo">Asistencias</div>

                <!-- Formulario para agregar fecha de asistencia -->
                <form id="agregar-fecha-form" class="mb-3">
                    <div class="d-flex align-items-center">
                        <div class="mr-2">
                            <label for="fechaAsistencia" class="sr-only">Fecha de Asistencia</label>
                            <input type="date" class="calendar mb-2 form-control" id="fechaAsistencia"
                                placeholder="Fecha de Asistencia" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Agregar Fecha</button>
                    </div>
                </form>
                <!-- Botón para agregar trabajos -->
                <button id="agregar-trabajo-btn" type="button" class="btn btn-success mb-3">Agregar Trabajo</button>
                <button class="btn btn-warning" onclick="openModal()">Editar</button>   
                
                <div class="divider-line"></div>
                <br>
                <form>
                    <div class="input-field">
                        <select id="actividad" name="actividad" required>
                            <option value="" disabled selected>Seleccione una Actividad</option>
                            <?php foreach ($actividades['actividades'] as $actividad):?>
                            <?php $idAc = $actividad['idactividad'] ?>
                            <option value="<?php echo $idAc ?>">
                                <?php echo $actividad['nombreactividad'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button id="" type="button" class="btn btn-primary mb-2"
                        onclick="<?php $list = $activityService->getListForActivity($idAc) ?>">Ver Asistencias</button>
                    <?php var_dump($list);?>
                </form>

                <!-- Tabla de Asistencias y Trabajos -->
                <div class="tabla">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="name">Nombre Participante</th>
                                <th class="moodleuser">Usuario Moodle</th>
                                <th class="moodlepass">Contraseña Moodle</th>
                                <th class="evaluacion">Evaluación</th>
                                <th class="coment">Comentarios</th>
                            </tr>
                        </thead>
                        <tbody id="tablaAsistenciaBody">
                            <?php if (isset($list)):?>
                            <?php foreach ($list as $docente):?>
                            <tr>
                                <td><?php echo $docente['nombredocente']?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   <!-- Modal EDITAR  -->
<div id="modaleditar" class="modal">
    <div class="modal-content contenido">
        <span class="close" onclick="closeModal()">&times;</span> <!-- Botón de cerrar -->
        <div class="tarjeta">
            <div class="modal-footer-title">Editar</div>
            <div class="divider-line"></div>
            <form class="form">
                <input type="hidden" id="action" name="action" value="update">
                <div class="campo">
                    <input type="text" id="nombre" name="nombre" value="<?php echo $actividad['nombreactividad'] ?>" required>
                    <label for="nombre">Nombre del participante</label>
                </div>
                <p>Cuenta Moodle</p>
                <div class="campo">
                    <input type="text" id="usermoodle" name="usermoodle" value="<?php echo $actividad['dirigidoa'] ?>" required>
                    <label for="usermoodle">Usuario</label>
                </div>
                <div class="campo">
                    <input type="text" id="passmoodle" name="passmoodle" value="<?php echo $actividad['dirigidoa'] ?>" required>
                    <label for="passmoodle">Contraseña</label>
                </div>
                <div class="campo">
                    <input type="text" id="evaluacion" name="evaluacion" value="<?php echo $actividad['dirigidoa'] ?>" required>
                    <label for="evaluacion">Evaluación</label>
                </div>
                <div class="campo">
                    <input type="text" id="coment" name="coment" value="<?php echo $actividad['fechaimp'] ?>" required>
                    <label for="coment">Comentarios</label>
                </div>
                <br>
                <div class="button-container">
                    <div>
                        <button class="blue-button" onclick="closeModal()">Cancelar</button>
                    </div>
                    <div>
                        <button class="green-button btnUpdateAc" id="btnUpdateAc" type="button">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


    <!--Footer-->
    <div>
        <?php include __DIR__ . '/../../templates/footer.html'; ?>
    </div>
    <!-- FIN Footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/SIGEFO/webapp/assets/js/asistencia.js"></script>

</body>

</html>