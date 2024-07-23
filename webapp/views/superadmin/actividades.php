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
require __DIR__."/../../../src/controller/activity/ActivityController.php";
$ActivityController = new ActivityController();
$data = $ActivityController->handleRequest();
$actividades = $data['actividades'];
$instructores = $data['instructores'];

$tipos = $data['tipos'];

$modalityController = new ModalityController();
$modalities = $modalityController->handleRequest();

?>

<div>
    <?php include __DIR__ . '/../../templates/header.html'; ?>
    </div>
    <div class="container-fluid d-flex flex-column min-vh-100">
        <div class="row flex-grow-1">
            <!-- Navegación Vertical -->
            <div class="col-md-2">
            <div class="navback">
                    <ul class="list-unstyled vertical-nav">
                    <li><a href="/SIGEFO/perfil" class="btn btn-block my-1 menu">Perfil</a></li>
                    <li><a href="/SIGEFO/actividades" class="btn btn-primary btn-block my-1 menu">Actividad Formativa</a></li>
                    <li><a href="/SIGEFO/usuarios" class="btn btn-primary btn-block my-1 menu">Usuarios</a></li>
                    <li><a href="/SIGEFO/consultas" class="btn btn-primary btn-block my-1 menu">Consultas</a></li>
                    <li><a href="/SIGEFO/controlasistencia" class="btn btn-primary btn-block my-1 menu">Asistencia</a></li>
                    <li><a href="/SIGEFO/login" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                </ul>
                </div>
            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <br>
                <div class="titulo">Actividades</div>
                <div>
                    <button class="actividad" onclick="openModal('modal3')">
                        <img src="/SIGEFO/webapp/assets/img/agregar.png" alt="Imagen" class="icono"> Nueva actividad
                    </button>
                </div>
                <div class="divider-line"></div>
                <br>
                <div class="tabla">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Status</th>
                                <th>Gestión</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($actividades as $actividad): ?>
                                <tr>
                                    <td><?php echo $actividad['nombre']; ?></td>
                                    <td><?php echo $actividad['status']; ?></td>
                                    <td>
                                    <div class="img-container">
                                        <img src="/SIGEFO/webapp/assets/img/lupa.png" alt="ver" onclick="openModal('modal1')" />
                                        <img src="/SIGEFO/webapp/assets/img/editar.png" alt="editar" onclick="openModal('modal2')" />
                                        <img src="/SIGEFO/webapp/assets/img/borrar.png" alt="borrar" id="deleteActivityImage" />
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <!-- Modales VER ACTIVIDAD -->
    <div id="modal1" class="modal">
        <div class="modal-content contenido">
            <div class="modal-body-content">
                <div class="modal-footer-title">Ver Actividad</div>
                <div class="divider-line"></div>
                <div class="modal-body-title">Desarrollo de actividades dentro del aula</div>
                <div class>
                <p>Dirigido al: </p>
                <p>Objetivo: </p>
                <p>Imparte: </p>
                <p>Modalidad: </p>
                <p>Duración: </p>
                <p>Fecha: </p>
                <p>Horario: </p>   
                </div>
                
                <div class="button-container">
                    <div>
                        <button class="blue-button" onclick="closeModal('modal1')">Regresar</button>
                    </div>
                    <div>
                        <button class="green-button">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 EDITAR ACTIVIDAD -->
    <div id="modal2" class="modal">
        <div class="modal-content contenido">
            <div class="tarjeta">
                <div class="modal-footer-title">Editar Actividad</div>
                <div class="divider-line"></div>
                <form class="form">
                <div class="campo">
                    <select id="modalidad" name="modalidad" required onchange="toggleOtraModalidad(this)">
                            <option value="" disabled selected>Seleccione una modalidad</option>
                            <?php foreach ($modalidades as $modalidad): ?>
                                <option value="<?php echo $modalidad['id']; ?>"><?php echo $modalidad['nombre']; ?></option>
                            <?php endforeach; ?>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="campo">
                        <input type="text" id="nombre" name="nombre" required="">
                        <label for="nombre">Nombre de la Actividad</label>
                        
                    </div>
                    <div class="campo">
                        <input type="text" id="dirigido" name="dirigido" required="">
                        <label for="dirigido">A quién va dirigido</label>
                    </div>
                    <div class="campo">
                        <textarea placeholder="" id="objetivo" name="objetivo" rows="3" cols="60" required=""></textarea>
                        <label for="objetivo">Objetivo</label>
                    </div>
                    <div class="campo">
                    <select id="Instructor" name="Instructor" required="">
                            <option value="" disabled selected>Seleccione el instructor</option>
                            <?php foreach ($instructores as $instructor): ?>
                                <option value="<?php echo $instructor['idInstructor']; ?>"><?php echo $instructor['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <select id="tipo" name="idTipo" required>
                            <option value="" disabled selected>Selecciona un tipo</option>
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?php echo $tipo['id']; ?>"><?php echo $tipo['tipo']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="campo">
                        <input type="text" id="Fecha" name="Fecha" required="">
                        <label for="Fecha">Fecha</label>
                    </div>
                    <div class="campo">
                        <input placeholder="" id="Duracion" name="Duracion" required="">
                        <label for="Duracion">Duración</label>
                    </div>
                    <div class="campo">
                        <input placeholder="" id="Horario" name="Horario" required="">
                        <label for="Horario">Horario</label>
                    </div>
                </form>
            </div>

            <div class="button-container">
                <div>
                    <button class="blue-button" onclick="closeModal('modal2')">Regresar</button>
                </div>
                <div>
                    <button class="green-button">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 3 NUEVA ACTIVIDAD -->
<div id="modal3" class="modal">
    <div class="modal-content contenido">
        <div class="tarjeta">
            <div class="modal-footer-title">Nueva Actividad</div>
            <div class="divider-line"></div>
            <form class="form" method="POST" action="/src/controller/activity/ActivityController.php">
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
                        <?php foreach ($tipos as $tipo): ?>
                            <option value="<?php echo $tipo['id']; ?>"><?php echo $tipo['tipo']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="campo">
                    <select id="Instructor" name="idInstructor" required>
                        <option value="" disabled selected>Selecciona un instructor</option>
                        <?php foreach ($instructores as $instructor): ?>
                            <option value="<?php echo $instructor['idInstructor']; ?>"><?php echo $instructor['nombre']; ?></option>
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
                    <input type="text" id="Fecha" name="Fecha" required>
                    <label for="Fecha">Fecha</label>
                </div>
                <div class="campo">
                    <input type="text" id="Horario" name="Horario" required>
                    <label for="Horario">Horario</label>
                </div>
                <div class="button-container">
                    <div>
                        <button class="blue-button" type="button" onclick="closeModal('modal3')">Regresar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/SIGEFO/webapp/assets/js/actividades.js"></script>

</body>

</html>