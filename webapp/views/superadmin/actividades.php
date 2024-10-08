<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/ActividadFormativa.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
</head>

<body>

    <?php
require __DIR__ . "/../../../src/controller/activity/ActivityController.php";
require __DIR__ . "/../../../src/controller/modality/ModalityController.php";
require __DIR__ . "/../../../src/controller/type/TypeController.php";
require __DIR__ . "/../../../src/service/user/UserService.php";
require __DIR__ . "/../../../src/controller/clasificacion/ClasificacionController.php";

$ActivityController = new ActivityController();
$actividades = $ActivityController->handleRequest();

$modalityController = new ModalityController();
$modalities = $modalityController->handleRequest();
$modalities = isset($modalities) ? $modalities : array();

$userService = new UserService();
$instructores = $userService->getAllInstructors();
$instructores = isset($instructores) ? $instructores : array();

$typeController = new TypeController();
$types = $typeController->handleRequest();
$types = isset($types) ? $types : array();

$clasificationController = new ClasificacionController();
$clasifications = $clasificationController->handleRequest();
$clasifications = isset($clasifications) ? $clasifications : array();

?>

    <div>
        <?php include __DIR__ . '/../../templates/header.html'; ?>
    </div>
    <div class="container-fluid d-flex flex-column min-vh-100">
        <div class="row flex-grow-1">
            <!-- Navegación Vertical -->
            <div class="col-md-2 d-none d-md-block bg-light sidebar">
                <div>
                    <?php include __DIR__ . '/../../templates/menuSuperAdmin.php'; ?>
                </div>
            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <br>
                <div class="titulo">Actividades</div>
                <div>
                    <button class="actividad" onclick="openModal('modalNA3')">
                        <img src="/SIGEFO/webapp/assets/img/agregar.png" alt="Imagen" class="icono"> Nueva actividad
                    </button>
                </div>
                <div class="divider-line"></div>
                <br>
                <div class="tabla">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="activity">Actividad</th>
                                <th class="status">Status</th>
                                <th class="management">Gestión</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($actividades['actividades'] == null): ?>
                            <tr>
                                <td>No hay actividades a mostrar</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($actividades['actividades'] as $actividad): ?>
                            <tr>
                                <td><?php echo $actividad['nombreactividad']; ?></td>
                                <td><?php echo $actividad['status'] ? "Enviado" : "Pendiente"; ?></td>
                                <td>
                                    <div class="img-container">
                                        <img src="/SIGEFO/webapp/assets/img/lupa.png" alt="ver"
                                            onclick="openModal('modal<?php echo $actividad['idactividad'] ?>') " />
                                        <img src="/SIGEFO/webapp/assets/img/editar.png" alt="editar"
                                            onclick="openModal('modalE<?php echo $actividad['idactividad'] ?>')" />
                                        <form id="formSuperAdminDelete" method="post"
                                            action="/src/controller/activity/ActivityController.php">
                                            <input type="hidden" id="idActividad" name="idActividad"
                                                value="<?php echo $actividad['idactividad'] ?>" />
                                            <input type="hidden" id="action" name="action" value="delete" required>
                                            <img src="/SIGEFO/webapp/assets/img/borrar.png" alt="borrar"
                                                id="deleteActivityImage" class="btnDeleteAc" />
                                            <!--<button class="green-button btnSendUpdate">Enviar</button>-->
                                        </form>
                                        <!--<img src="/../webapp/assets/img/borrar.png" alt="borrar" id="deleteActivityImage"/>-->
                                    </div>
                                </td>
                            </tr>

                            <!-- Modales VER ACTIVIDAD -->
                            <div id="modal<?php echo $actividad['idactividad'] ?>" class="modal">
                                <div class="modal-content contenido">
                                    <div class="modal-header">
                                        <h2>Ver Actividad</h2>
                                        <span class="close"
                                            onclick="closeModal('modal<?php echo $actividad['idactividad'] ?>')">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <h3><?php echo $actividad['nombreactividad']; ?></h3>
                                        <p><strong>Dirigido a</strong> <?php echo $actividad['dirigidoa'] ?></p>
                                        <p><strong>Objetivo:</strong> <?php echo $actividad['objetivo'] ?></p>
                                        <p><strong>Imparte:</strong>
                                            <?php echo $actividad['nombre'] . ' ' . $actividad['paterno'] . ' ' . $actividad['materno'] ?>
                                        </p>
                                        <p><strong>Modalidad:</strong> <?php echo $actividad['modalidad'] ?></p>
                                        <p><strong>Duración:</strong> <?php echo $actividad['duracion'] ?></p>
                                        <p><strong>Fecha:</strong> <?php echo $actividad['fechaimp'] ?></p>
                                        <p><strong>Horario:</strong> <?php echo $actividad['horaimp'] ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary"
                                            onclick="closeModal('modal<?php echo $actividad['idactividad'] ?>')">Regresar</button>
                                        <form id="formSuperAdminSend" method="post"
                                            action="/src/controller/activity/ActivityController.php">
                                            <input type="hidden" id="idActividad" name="idActividad"
                                                value="<?php echo $actividad['idactividad'] ?>" />
                                            <input type="hidden" id="action" name="action" value="sendToPublic"
                                                required>
                                            <button class="btn btn-primary btnSendAc">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal 2 EDITAR ACTIVIDAD -->
                            <div id="modalE<?php echo $actividad['idactividad'] ?>" class="modal">
                                <div class="modal-content contenido">
                                    <div class="tarjeta">
                                        <div class="modal-footer-title">Editar Actividad</div>
                                        <div class="divider-line"></div>
                                        <form class="form formSuperAdminUpdate" id="formSuperAdminUpdate" method="post"
                                            action="/src/controller/activity/ActivityController.php">
                                            <input type="hidden" id="action" name="action" value="update">
                                            <div class="campo">
                                                <select id="modalidad" name="modalidad" required>
                                                    <option value="" disabled selected>
                                                        <?php echo $actividad['modalidad'] ?></option>
                                                    <?php $count = min(9, count($modalities));
                                                for ($i = 0; $i < $count; $i++): ?>
                                                    <option value="<?php echo $modalities[$i]['id'] ?>">
                                                        <?php echo $modalities[$i]['nombre'] ?>
                                                    </option>
                                                    <?php endfor; ?>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="campo">
                                                <input type="text" id="nombre" name="nombre"
                                                    value="<?php echo $actividad['nombreactividad'] ?>" required>
                                                <label for="nombre">Nombre de la Actividad</label>
                                            </div>
                                            <div class="campo">
                                                <input type="text" id="dirigido" name="dirigido"
                                                    value="<?php echo $actividad['dirigidoa'] ?>" required>
                                                <label for="dirigido">A quién va dirigido</label>
                                            </div>
                                            <div class="campo">
                                                <textarea placeholder="" id="objetivo" name="objetivo" rows="3"
                                                    cols="71" required><?php echo $actividad['objetivo'] ?></textarea>
                                                <label for="objetivo"></label>
                                            </div>
                                            <div class="campo">
                                                <select id="Instructor" name="instructor" required>
                                                    <option value="" disabled selected>
                                                        <?php echo $actividad['nombre'] . ' ' . $actividad['paterno'] . ' ' . $actividad['materno'] ?>
                                                    </option>
                                                    <br>
                                                    <?php foreach ($instructores as $instructor): ?>
                                                    <option value="<?php echo $instructor['idinstructor'] ?>">
                                                        <?php echo $instructor['nombre'] . ' ' . $instructor['paterno'] . ' ' . $instructor['materno'] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <br>
                                            <select id="tipo" name="idTipo" required>
                                                <option value="" disabled selected><?php echo $actividad['tipo'] ?>
                                                </option>
                                                <?php foreach ($types as $type): ?>
                                                <option value="<?php echo $type['id'] ?>">
                                                    <?php echo $type['tipo'] ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="campo">
                                                <input type="text" id="Fecha" name="fecha"
                                                    value="<?php echo $actividad['fechaimp'] ?>" required>
                                                <label for="Fecha">Fecha</label>
                                            </div>
                                            <div class="campo">
                                                <input placeholder="" id="Duracion" name="duracion"
                                                    value="<?php echo $actividad['duracion'] ?>" required>
                                                <label for="Duracion">Duración</label>
                                            </div>
                                            <div class="campo">
                                                <input placeholder="" id="Horario" name="horario"
                                                    value="<?php echo $actividad['horaimp'] ?>" required>
                                                <label for="Horario">Horario</label>
                                            </div>
                                            <input type="hidden" id="idInstructor" name="idActividad"
                                                value="<?php echo $actividad['idactividad'] ?>" required>
                                            <input type="hidden" id="action" name="action" value="update" required>
                                            <div class="button-container">
                                                <div>
                                                    <button class="blue-button"
                                                        onclick="closeModal('modalE<?php echo $actividad['idactividad'] ?>')">
                                                        Regresar
                                                    </button>
                                                </div>
                                                <div>
                                                    <button class="green-button btnUpdateAc" id="btnUpdateAc"
                                                        type="button">
                                                        Actualizar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Modal 3 NUEVA ACTIVIDAD -->
        <div id="modalNA3" class="modal">
            <div class="modal-content contenido">
                <div class="tarjeta">
                    <div class="modal-footer-title">Nueva Actividad</div>
                    <div class="divider-line"></div>
                    <form class="form" id="formSuperAdmin" method="POST" action="/src/controller/activity/ActivityController.php">
                        <input type="hidden" name="action" value="save">
                        <div class="campo">
                            <select id="modalidad" name="modalidad" required onchange="toggleOtraModalidad(this)">
                                <option value="" disabled selected>Seleccione una modalidad</option>
                                <?php foreach ($modalities as $modality): ?>
                                <option value="<?php echo $modality['id'] ?>">
                                    <?php echo $modality['nombre'] ?>
                                </option>
                                <?php endforeach; ?>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="campo">
                            <input type="text" id="nombre" name="nombre" required>
                            <label for="nombre">Nombre de la Actividad</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="dirigido" name="dirigido" required>
                            <label for="dirigido">A quién va dirigido</label>
                        </div>
                        <div class="campo">
                            <select id="tipo" name="idTipo" required>
                                <option value="" disabled selected>Selecciona un tipo</option>
                                <?php foreach ($types as $tipo): ?>
                                <option value="<?php echo $tipo['id']; ?>"><?php echo $tipo['tipo']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="campo">
                            <select id="Instructor" name="idInstructor" required>
                                <option value="" disabled selected>Selecciona un instructor</option>
                                <?php foreach ($instructores as $instructor): ?>
                                <option value="<?php echo $instructor['idinstructor']; ?>">
                                    <?php echo $instructor['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="campo">
                            <input type="text" id="ingreso" name="ingreso" required>
                            <label for="ingreso">Perfil de ingreso</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="egreso" name="egreso" required>
                            <label for="egreso">Perfil de egreso</label>
                        </div>
                        <h5 class="titulos">Clasificación de la actividad</h5>
                        <div class="campo">
                            <select id="clasificacion" name="clasificacion" required>
                                <option value="">Seleccione la clasificación</option>
                                <?php foreach ($clasifications as $clasification): ?>
                                <option value="<?php echo $clasification['id'] ?>">
                                    <?php echo $clasification['nombre'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="campo">
                            <input type="number" id="presencial" name="presencial" required>
                            <label for="presencial">Presenciales</label>
                        </div>
                        <div class="campo">
                            <input type="number" id="enLinea" name="enLinea" required>
                            <label for="enLinea">En Línea</label>
                        </div>
                        <div class="campo">
                            <input type="number" id="independiente" name="independiente" required>
                            <label for="independiente">Trabajo Independiente</label>
                        </div>
                        <div class="campo">
                            <p>Total de la actividad (horas): </p>
                            <input type="number" id="duracion" name="duracion" required readonly>
                        </div>
                        <div class="campo">
                            <input type="text" id="objetivo" name="objetivo" required>
                            <label for="objetivo">Objetivo general</label>
                        </div>
                        <div class="campo">
                            <input type="text" id="temario" name="temario" required>
                            <label for="temario">Temario</label>
                        </div>
                        <div class="campo">
                            <input type="number" id="cupo" name="cupo" required>
                            <label for="cupo">Cupo</label>
                        </div>
                        <div class="campo">
                            <br>
                            <p>Presentación de la actividad formativa (Máximo 500 palabras)</p>
                            <textarea id="presentacion" name="presentacion" rows="2" cols="72" required
                                oninput="countWords()"></textarea>
                            <p id="wordCountDisplay">Palabras: 0 / 500</p>
                        </div>
                        <div class="campo">
                            <input type="date" id="fecha" name="fecha" required>
                            <label for="Fecha">Fecha DD-MM-AAAA</label>
                        </div>
                        <div class="campo">
                            <input type="time" id="horario" name="horario" required>
                            <label for="Horario">Horario</label>
                        </div>
                        <div class="button-container">
                            <div>
                                <button class="blue-button" type="button"
                                    onclick="closeModal('modalNA3')">Regresar</button>
                            </div>
                            <div>
                                <button class="green-button" type="submit">Enviar</button>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/SIGEFO/webapp/assets/js/actividades.js"></script>

</body>

</html>