<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Formulario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/form.css"/>
   <!-- <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css"/> -->
</head>

<body>
<?php
session_start();
require __DIR__ . "/../../../src/service/user/UserService.php";
require __DIR__ . "/../../../src/service/instructor/InstructorService.php";
require __DIR__ . "/../../../src/controller/profile/ProfileController.php";
require __DIR__ . "/../../../src/controller/modality/ModalityController.php";
require __DIR__ . "/../../../src/controller/type/TypeController.php";
require __DIR__ . "/../../../src/controller/clasificacion/ClasificacionController.php";
require __DIR__ . "/../../../src/controller/recurso/RecursoController.php";
require __DIR__ . "/../../../src/controller/formInstructor/FormController.php";

$profileController = new ProfileController();
$profiles = $profileController->handleRequest();
$profiles = isset($profiles) ? $profiles : array();

$modalityController = new ModalityController();
$modalities = $modalityController->handleRequest();
$modalities = isset($modalities) ? $modalities : array();

$typeController = new TypeController();
$types = $typeController->handleRequest();
$types = isset($types) ? $types : array();

$clasificationController = new ClasificacionController();
$clasifications = $clasificationController->handleRequest();
$clasifications = isset($clasifications) ? $clasifications : array();

$resourceController = new RecursoController();
$resources = $resourceController->handleRequest();
$resources = isset($resources) ? $resources : array();

$formController = new FormController();
$form = $formController->handleRequest();

if (isset($_SESSION['idUsuario'])){
    $userService = new UserService();
    $user = $userService->getOne($_SESSION['idUsuario']);
}

if (isset($_SESSION['idInstructor'])) {
    $instructorService = new InstructorService();
    $instructor = $instructorService->getOne($_SESSION['idInstructor']);
}
?>
<div>
    <?php include __DIR__ . '/../../templates/header.html'; ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 bg-light">
            <!-- Menu -->
            <?php include __DIR__ . '/../../templates/menuInstructor.php'; ?> 
        </div>
        <!-- Contenido Principal -->
        <div class="col-lg-10">
            <div class="contenido mx-auto" style="max-width:800px;">
                <h4 id="section-title">Datos Generales</h4>
                <div class="line"></div>
                <form class="form" id="formInstructor" action="/src/controller/formInstructor/FormController.php"
                      method="POST">
                    <!-- Sección 1 -->
                    <div class="form-section">
                        <div class="input-field"> 
                            <input type="text" id="nombre" name="nombre" required
                                   value="<?php echo isset($user) ? $user['nombre'] : null ?>">
                            <label for="nombre">Nombre(s)</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required
                                   value="<?php echo isset($user) ? $user['paterno'] : null ?>">
                            <label for="apellidoPaterno">Apellido Paterno</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="apellidoMaterno" name="apellidoMaterno" required
                                   value="<?php echo isset($user) ? $user['materno'] : null ?>">
                            <label for="apellidoMaterno">Apellido Materno</label>
                        </div>
                        <div class="input-field">
                            <input type="email" id="correo" name="correo" required
                                   value="<?php echo isset($user) ? $user['correo'] : "" ?>">
                            <label for="correo">Correo Electrónico</label>
                        </div>
                        <div class="input-field">
                            <input type="tel" id="telefono" name="telefono" required
                                   value="<?php echo isset($instructor) ? $instructor['telefono'] : null ?>">
                            <label for="telefono">Teléfono de Contacto</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="gradoAcademico" name="gradoAcademico" required
                                   value="<?php echo isset($instructor) ? $instructor['grado'] : null ?>">
                            <label for="gradoAcademico">Último Grado Académico</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="institucion" name="institucion" required
                                   value="<?php echo isset($instructor) ? $instructor['institucion'] : null ?>">
                            <label for="institucion">Institución Académica del Último Grado</label>
                        </div>
                        <div class="input-field">
                            <select id="perfil" name="perfil" required>
                                <option value="" disabled selected>Selecciona un perfil</option>
                                <?php foreach ($profiles as $profile): ?>
                                    <option value="<?php echo $profile['id'] ?>">
                                        <?php echo $profile['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <input type="text" id="docencia" name="docencia" required
                                   value="<?php echo isset($instructor) ? $instructor['tiempodocencia'] : null ?>">
                            <label for="docencia">Tiempo Dedicado a la Docencia</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="areas" name="areas" required>
                            <label for="areas">Áreas de Dominio</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="semblanza" name="semblanza" required
                                   value="<?php echo isset($instructor) ? $instructor['semblanza'] : null ?>"></input>
                            <label for="semblanza">Breve Semblanza Curricular</label>
                        </div>
                        <button type="button" class="btn btn-primary botones btn-right"
                                onclick="nextStep()">Siguiente
                        </button>
                    </div>

                    <!-- Sección 2 -->
                    <div class="form-section" style="display: none;">
                        <h5 class="titulos">Modalidad de la Actividad Formativa</h5>
                        <div class="input-field">
                            <select id="modalidad" name="modalidad" required onchange="toggleOtraModalidad(this)">
                                <option value="" disabled selected>Seleccione una modalidad</option>
                                <?php $count = min(9, count($modalities));
                                for ($i = 0; $i < $count; $i++): ?>
                                    <option value="<?php echo $modalities[$i]['id'] ?>">
                                        <?php echo $modalities[$i]['nombre'] ?>
                                    </option>
                                <?php endfor; ?>
                                <option value="otro" name="otro">Otro</option>
                            </select>
                        </div>
                        <div class="input-field" id="otraModalidad" style="display: none;">
                            <input type="text" id="otraModalidadTexto" name="otraModalidadTexto">
                            <label for="otraModalidadTexto">Especifique Otra Modalidad</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="nombreActividad" name="nombreActividad" required>
                            <label for="nombreActividad">Nombre de la Actividad</label>
                        </div>
                        <h5 class="titulos">Indique el total de horas para el desarrollo de la actividad</h5>
                        <div class="input-field">
                            <input type="number" id="presencial" name="presencial" required>
                            <label for="presencial">Presenciales</label>
                        </div>
                        <div class="input-field">
                            <input type="number" id="enLinea" name="enLinea" required>
                            <label for="enLinea">En Línea</label>
                        </div>
                        <div class="input-field">
                            <input type="number" id="independiente" name="independiente" required>
                            <label for="independiente">Trabajo Independiente</label>
                        </div>
                        <div class="input-field">
                            <p>Total de la actividad (horas): </p>
                            <input type="number" id="duracion" name="duracion" required readonly>
                        </div>
                        <div class="button-group">
                            <button type="button" class="btn btn-secondary botones btn-left"
                                    onclick="prevStep()">Anterior
                            </button>
                            <button type="button" class="btn btn-primary botones btn-right"
                                    onclick="nextStep()">Siguiente
                            </button>
                        </div>
                    </div>

                    <!-- Sección 3 -->
                    <div class="form-section" style="display: none;">
                        <div class="input-field">
                            <select id="tipo" name="tipo" required>
                                <option value="">Seleccione el Tipo</option>
                                <?php foreach ($types as $type): ?>
                                    <option value="<?php echo $type['id'] ?>">
                                        <?php echo $type['tipo'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <input type="text" id="dirigido" name="dirigido" required>
                            <label for="dirigido">Dirigido a</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="ingreso" name="ingreso" required>
                            <label for="ingreso">Perfil de ingreso</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="egreso" name="egreso" required>
                            <label for="egreso">Perfil de egreso</label>
                        </div>
                        <h5 class="titulos">Clasificación de la actividad</h5>
                        <div class="input-field">
                            <select id="clasificacion" name="clasificacion" required>
                                <option value="">Seleccione la clasificación</option>
                                <?php foreach ($clasifications as $clasificacion): ?>
                                    <option value="<?php echo $clasificacion['id'] ?>">
                                        <?php echo $clasificacion['nombre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <br>
                            <p>Presentación de la actividad formativa (Máximo 500 palabras)</p>
                            <textarea id="presentacion" name="presentacion" rows="2" cols="50" required
                                      oninput="countWords()"></textarea>
                            <p id="wordCountDisplay">Palabras: 0 / 500</p>
                        </div>
                        <h5 id="section-title">Duración de la Actividad Formativa</h5>
                        <div class="input-field">
                            <input type="text" id="objetivo" name="objetivo" required>
                            <label for="objetivo">Objetivo general</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="temario" name="temario" required>
                            <label for="temario">Temario</label>
                        </div>
                        <div class="input-field"><!--No se ocupa para el PA-->
                            <input type="text" id="actividad" name="actividad" required>
                            <label for="actividad">Actividades</label>
                        </div>
                        <div class="input-field">
                            <input type="number" id="cupo" name="cupo" required>
                            <label for="cupo">Cupo</label>
                        </div>
                        <br>
                        <div class="input-field">
                        <p>Seleccione la fecha: </p>
                            <input type="date" id="fecha" name="fecha" required>
                            
                        </div>
                        <br>
                        <div class="input-field">
                            <p>Seleccione la hora: </p>
                            <input type="time" id="hora" name="hora" required>
                            
                        </div>
                        <div class="button-group">
                            <button type="button" class="btn btn-secondary botones btn-left"
                                    onclick="prevStep()">Anterior
                            </button>
                            <button type="button" class="btn btn-primary botones btn-right"
                                    onclick="nextStep()">Siguiente
                            </button>
                        </div>
                    </div>

                    <!-- Sección 4 -->
                    <div class="form-section" style="display: none;">
                        <h5 class="titulos">Tipo de recurso que requiere (Marque la casilla con la opción deseada)
                        </h5>
                        <div class="checkbox-wrapper-46">
                            <?php foreach ($resources as $resource): ?>
                                <input type="checkbox" id="cbx-46-<?php echo $resource['idrecurso'] ?>" class="inp-cbx"
                                       name="recurso" value="<?php echo $resource['idrecurso'] ?>"/>
                                <label for="cbx-46-<?php echo $resource['idrecurso'] ?>" class="cbx">
                                        <span>
                                            <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                    <span><?php echo $resource['recurso'] ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" id="action" name="action" value="save">
                        <input type="hidden" id="idUsuario" name="idUsuario"
                               value="<?php echo isset($_SESSION['idUsuario']) ?>">
                        <input type="hidden" id="idInstructor" name="idInstructor"
                               value="<?php echo isset($_SESSION['idInstructor']) ? $_SESSION['idInstructor'] : null ?>">
                        <div class="button-group">
                            <button type="button" class="btn btn-secondary botones btn-left"
                                    onclick="prevStep()">Anterior
                            </button>
                            <button type="submit" class="btn btn-primary enviar">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div>
    <?php include __DIR__ . '/../../templates/footer.html'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/SIGEFO/webapp/assets/js/form.js"></script>
</body>

</html>