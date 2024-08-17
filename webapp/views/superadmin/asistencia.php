<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Asistencia</title>
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/asistencia.css"/>
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css"/>
</head>

<body>
<?php
require_once __DIR__ . "/../../../src/controller/activity/ActivityController.php";
require_once __DIR__ . "/../../../src/service/activity/ActivityService.php";

$activityController = new ActivityController();
$actividades = $activityController->handleRequest();
$actividades = isset($actividades) ? $actividades : array();

$docentes = $activityController->handleRequest();
$docentes = isset($docentes) ? $docentes : array();
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
        <div class="col-lg-10">
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

            <div class="divider-line"></div>
            <br>
            <form method="get" action="/SIGEFO/controlasistencia">
                <div class="input-field">
                    <select id="actividad" name="control" required>
                        <option value="" disabled selected>Seleccione una Actividad</option>
                        <?php foreach ($actividades['actividades'] as $actividad): ?>
                            <option value="<?php echo $actividad['idactividad'] ?>">
                                <?php echo $actividad['nombreactividad'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button id="" type="submit" class="btn btn-primary mb-2">Ver Asistencias</button>
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
                        <th class="coment">Opciones</th>
                    </tr>
                    </thead>
                    <tbody id="tablaAsistenciaBody">
                    <?php if (isset($docentes['docentes'])): ?>
                        <?php if ($docentes['docentes'] == null): ?>
                            <tr>
                                <td colspan="6">No hay datos para la actividad</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($docentes['docentes'] as $docente): ?>
                                <tr>
                                    <td><?php echo isset($docente['nombredocente']) ? $docente['nombredocente'] : null ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo isset($docente['evaluacion']) ? $docente['evaluacion'] : 'No hay evaluacion' ?></td>
                                    <td><?php echo isset($docente['comentarios']) ? $docente['comentarios'] : 'No hay comentarios' ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="openModal('modaleditar<?php echo $docente['iddocente']?>')">Editar</button>
                                    </td>
                                </tr>
                                <!-- Modal EDITAR  -->
                                <div id="modaleditar<?php echo $docente['iddocente']?>" class="modal">
                                    <div class="modal-content contenido">
                                        <span class="close" onclick="closeModal('modaleditar<?php echo $docente['iddocente']?>')">&times;</span> <!-- Botón de cerrar -->
                                        <div class="tarjeta">
                                            <div class="modal-footer-title">Editar</div>
                                            <div class="divider-line"></div>
                                            <div class="campo">
                                                <label for="nombre"><?php echo isset($docente['nombredocente']) ? $docente['nombredocente'] : null ?></label>
                                            </div>
                                            <br>
                                            <form class="form" id="formUpdIns" method="post" action="/src/controller/docente/DocenteController.php">
                                                <input type="hidden" name="action" value="evaluacion" />
                                                <p>Cuenta Moodle</p>
                                                <div class="campo">
                                                    <input type="text" id="usermoodle" name="usermoodle"
                                                           value="<?php echo null ?>" required />
                                                    <label for="usermoodle">Usuario</label>
                                                </div>
                                                <div class="campo">
                                                    <input type="text" id="passmoodle" name="passmoodle"
                                                           value="<?php echo null ?>" required />
                                                    <label for="passmoodle">Contraseña</label>
                                                </div>
                                                <br>
                                                <div class="campo">
                                                    <select id="evaluacion" name="evaluacion" required>
                                                        <option value="" disabled selected><?php echo isset($docente['evaluacion']) ? $docente['evaluacion'] : 'Evalue al Docente' ?></option>
                                                        <option value="true">Aprobado</option>
                                                        <option value="false">No aprobado</option>
                                                    </select>
                                                </div>
                                                <div class="campo">
                                                    <input type="text" id="coment" name="coment" value="<?php echo isset($docente['comentarios']) ? $docente['comentarios'] : 'Agregue sus comentarios' ?>"
                                                           required />
                                                    <label for="coment">Comentarios</label>
                                                </div>

                                                <input type="hidden" name="iddocente" value="<?php echo $docente['iddocente']?>" />
                                                <br>
                                                <div class="button-container">
                                                    <div>
                                                        <button class="blue-button" onclick="closeModal('modaleditar<?php echo $docente['iddocente']?>')">Cancelar</button>
                                                    </div>
                                                    <div>
                                                        <button class="green-button" id="btnUpdateAc" type="submit">Editar Evaluacion</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Seleccione una Actividad para ver la lista de Docentes Inscritos</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<div>
    <?php include __DIR__ . '/../../templates/footer.html'; ?>
</div>
<!-- FIN Footer -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/SIGEFO/webapp/assets/js/asistencia.js"></script>

</body>

</html>
