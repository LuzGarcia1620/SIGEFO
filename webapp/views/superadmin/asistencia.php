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
                            <input type="date" class="calendar mb-2 form-control" id="fechaAsistencia" placeholder="Fecha de Asistencia" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Agregar Fecha</button>
                    </div>
                </form>
                     <!-- Botón para agregar trabajos -->
                <button id="agregar-trabajo-btn" type="button" class="btn btn-success mb-3">Agregar Trabajo</button>
                <button class="btn btn-warning">Editar</button>
                <div class="divider-line"></div>
                <br>
                <form >
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
                    <button id="" type="button" class="btn btn-primary mb-2" onclick="<?php $list = $activityService->getListForActivity($idAc) ?>">Ver Asistencias</button>
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