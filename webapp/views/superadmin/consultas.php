<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/consultas.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
    <style>
        .hidden-select {
            display: none;
        }
    </style>
</head>

<body>
<?php
require_once __DIR__ . "/../../../src/controller/activity/ActivityController.php";
require_once __DIR__ . "/../../../src/controller/unidadAcademica/UnidadAcademicaController.php";
require_once __DIR__ . "/../../../src/controller/user/UserController.php";
require_once __DIR__ . "/../../../src/controller/docente/DocenteController.php";
require_once __DIR__ . "/../../../src/controller/instructor/InstructorController.php";

$activityController = new ActivityController();
$activities = $activityController->handleRequest();

$activitiesForYear = $activityController->handleRequest();

$activitiesForGender = $activityController->handleRequest();

$userController = new UserController();
$instructores = $userController->handleRequest();

$instructorController = new InstructorController();
$activitiesForIns = $instructorController->handleRequest();

$unidadController = new UnidadAcademicaController();
$unidades = $unidadController->handleRequest();

$activitiesForUnity = $unidadController->handleRequest();

$docenteController = new DocenteController();
$docentes = $docenteController->handleRequest();

$activitiesForDocente = $docenteController->handleRequest();
?>
<div>
    <?php include __DIR__ . '/../../templates/header.html'; ?>
</div>
<div class="container-fluid">
    <div class="row">
        <!-- menu -->
        <div class="col-md-2 d-none d-md-block bg-light sidebar">
            <div>
                <?php include __DIR__ . '/../../templates/menuSuperAdmin.php'; ?>
            </div>
        </div>
        <!-- Contenido Principal -->
        <div class="col-lg-10">
            <div class="containercons">
                <div class="tittle">Consultas</div>

                <div class="radio-input">
                    <label>
                        <input id="inputYear" type="radio" name="value-radio" value="year" onclick="showSelect('selectYear', 'resultTableYear');" />
                        <span class="name">Año</span>
                    </label>
                    <label class="radio">
                        <input id="inputIns" type="radio" name="value-radio" value="instructor" onclick="showSelect('selectInstructor', 'resultTableInstructor');"/>
                        <span class="name">Instructor</span>
                    </label>
                    <label class="radio">
                        <input id="inputUnit" type="radio" name="value-radio" value="unit" onclick="showSelect('selectUnit', 'resultTableUnit');"/>
                        <span class="name">Unidad Académica</span>
                    </label>
                    <label class="radio">
                        <input id="inputDoc" type="radio" name="value-radio" value="teacher" onclick="showSelect('selectTeacher', 'resultTableDocente');"/>
                        <span class="name">Docente</span>
                    </label>
                    <label class="radio">
                        <input id="inputGen" type="radio" name="value-radio" value="gender" onclick="showSelect('selectGender', 'resultTableGender');"/>
                        <span class="name">Género</span>
                    </label>
                </div>

                <!-- Select Inputs -->
                <div class="d-flex justify-content-center align-items-center" style="min-height: 100px;">
                    <div id="selectYear" class="hidden-select">
                        <form method="get" action="/SIGEFO/consultas" id="formYear" class="d-flex align-items-center">
                            <select style="width: 300px;" name="anio" id="anio" class="form-control">
                                <option value="" disabled selected>Seleccione el año</option>
                                <?php foreach ($activities['anios'] as $anio):?>
                                    <option value="<?php echo $anio['anio']?>">
                                        <?php echo $anio['anio']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <!-- Botón de búsqueda -->
                            <div id="searchBtnContainer" class="ml-3">
                                <button type="submit" id="searchYearBtn" class="btn btn-primary searchBtn form-margin">Buscar Por Año</button>
                            </div>
                        </form>
                    </div>

                    <div id="selectInstructor" class="hidden-select">
                        <form method="get" action="/SIGEFO/consultas" id="formInstructor" class="d-flex align-items-center">
                            <select class="form-control" name="instructor" id="instructor" style="width: 300px;">
                                <option value="" disabled selected>Seleccione el Instructor</option>
                                <?php foreach ($instructores['instructores'] as $instructor):?>
                                    <option value="<?php echo $instructor['idinstructor']?>">
                                        <?php echo $instructor['nombre'] . ' ' . $instructor['paterno'] . ' ' . $instructor['materno']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <!-- Botón de búsqueda -->
                            <div id="searchBtnContainer" class="ml-3">
                                <button id="searchInsBtn" class="btn btn-primary searchBtn form-margin" onclick="<?php $acForIns = $activitiesForIns->queryGetActivityForInstructor($insForAc);?>">Buscar Por Instructor</button>
                            </div>
                        </form>
                    </div>

                    <div id="selectUnit" class="hidden-select">
                        <form method="get" action="/SIGEFO/consultas" id="formUnidad" class="d-flex align-items-center">
                            <select class="form-control" name="unidad" id="unidad" style="width: 300px;">
                                <option value="" disabled selected>Seleccione el Unidad Academica</option>
                                <?php foreach ($unidades as $unidad):?>
                                    <option value="<?php echo $unidad['id']?>">
                                        <?php echo $unidad['nombre']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <!-- Botón de búsqueda -->
                            <div id="searchBtnContainer" class="ml-3">
                                <button type="submit" id="searchUnitBtn" class="btn btn-primary searchBtn form-margin" >Buscar Por Unidad Academica</button>
                            </div>
                        </form>
                    </div>

                    <div id="selectTeacher" class="hidden-select">
                        <form method="get" action="/SIGEFO/consultas" id="formDocente" class="d-flex align-items-center">
                            <select class="form-control" name="docente" id="docente" style="width: 300px;">
                                <option value="" disabled selected>Seleccione el Docente</option>
                                <?php foreach ($docentes as $docente):?>
                                    <option value="<?php echo $docente['iddocente']?>">
                                        <?php echo $docente['nombre'] . ' ' . $docente['paterno'] . ' ' . $docente['materno']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <!-- Botón de búsqueda -->
                            <div id="searchBtnContainer" class="ml-3">
                                <button id="searchDocBtn" class="btn btn-primary searchBtn form-margin" onclick="<?php $acDoc = $activitiesForDoc->queryActivitiesForDocente($selectedDocente);?>">Buscar Por Instructor</button>
                            </div>
                        </form>
                    </div>

                    <div id="selectGender" class="hidden-select">
                        <form method="get" action="/SIGEFO/consultas" id="formGender" class="d-flex align-items-center">
                            <select class="form-control" name="act" id="act" style="width: 300px;">
                                <option value="" disabled selected>Seleccione la Actividad</option>
                                <?php foreach ($activities['actividades'] as $actividad):?>
                                    <option value="<?php echo $actividad['idactividad'] ?>">
                                        <?php echo $actividad['nombreactividad']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <!-- Botón de búsqueda -->
                            <div id="searchBtnContainer" class="ml-3">
                                <button id="searchGenderBtn" class="btn btn-primary searchBtn form-margin" onclick="<?php $acGender = $activitiesFound->queryForGender($selectedActividad);?>">Buscar Por Genero</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="divider-line"></div>
                <br>

                <input placeholder="Buscar" type="search" class="buscar">
                <br>

                <div id="resultTableYear" class="table-responsive mt-4" style="display: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Instructor</th>
                            <th>Fecha</th>
                            <th>Duración</th>
                            <th>Categoría</th>
                            <th>Tipo</th>
                            <th>N° Participantes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($activitiesForYear)):?>
                            <?php foreach ($activitiesForYear as $ac):?>
                            <tr>
                                <td><?php echo $ac['nombre_actividad']?></td>
                                <td><?php echo $ac['nombre_instructor']?></td>
                                <td><?php echo $ac['fecha']?></td>
                                <td><?php echo $ac['duracion']?></td>
                                <td><?php echo $ac['categoria']?></td>
                                <td><?php echo $ac['tipo']?></td>
                                <td><?php echo $ac['num_participantes']?></td>
                            </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>

                <div id="resultTableUnit" class="table-responsive mt-4" style="display: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Instructor</th>
                            <th>Fecha</th>
                            <th>Duración</th>
                            <th>Categoría</th>
                            <th>Tipo</th>
                            <th>N° Participantes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($activitiesForUnity)):?>
                            <?php foreach ($activitiesForUnity as $ac):?>
                                <tr>
                                    <td><?php echo $ac['nombre_actividad']?></td>
                                    <td><?php echo $ac['nombre_instructor']?></td>
                                    <td><?php echo $ac['fecha']?></td>
                                    <td><?php echo $ac['duracion']?></td>
                                    <td><?php echo $ac['categoria']?></td>
                                    <td><?php echo $ac['tipo']?></td>
                                    <td><?php echo $ac['num_participantes']?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>

                <!-- Tabla de resultados por instructor -->
                <div id="resultTableInstructor" class="table-responsive mt-4" style="display: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Duracion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($activitiesForIns)):?>
                            <?php foreach ($activitiesForIns as $acI):?>
                                <tr>
                                    <td><?php echo $acI['nombre']?></td>
                                    <td><?php echo $acI['fechaimp']?></td>
                                    <td><?php echo $acI['duracion']?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>

                <div id="resultTableDocente" class="table-responsive mt-4" style="display: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nombre Actividad</th>
                            <th>Instructor</th>
                            <th>Fecha</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($activitiesForDocente)):?>
                            <?php foreach ($activitiesForDocente as $acD):?>
                                <tr>
                                    <td><?php echo $acD['instructor']?></td>
                                    <td><?php echo $acD['actividad_nombre']?></td>
                                    <td><?php echo $acD['fecha_actividad']?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>

                <!-- Tabla de resultados por género -->
                <div id="resultTableGender" class="table-responsive mt-4" style="display: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Total Hombres</th>
                            <th>Total Mujeres</th>
                            <th>Total General</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($activitiesForGender)):?>
                            <?php foreach ($activitiesForGender as $acG):?>
                                <tr>
                                    <td><?php echo $acG['total_hombres']?></td>
                                    <td><?php echo $acG['total_mujeres']?></td>
                                    <td><?php echo $acG['total_participantes']?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>

                <!-- Más tablas según se necesiten... -->

            </div>
        </div>
    </div>
</div>

<!--Footer-->
<div>
    <?php include __DIR__ . '/../../templates/footer.html'; ?>
</div>

<script src="/SIGEFO/webapp/assets/js/consultas.js"></script>
</body>
</html>
