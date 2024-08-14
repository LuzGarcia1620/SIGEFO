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
require_once __DIR__ . "/../../../src/service/activity/ActivityService.php";
require_once __DIR__ . "/../../../src/controller/unidadAcademica/UnidadAcademicaController.php";
require_once __DIR__ . "/../../../src/service/unidadAcademica/UnidadAcademicaService.php";
require_once __DIR__ . "/../../../src/controller/user/UserController.php";
require_once __DIR__ . "/../../../src/service/user/UserService.php";
require_once __DIR__ . "/../../../src/service/instructor/InstructorService.php";
require_once __DIR__ . "/../../../src/controller/docente/DocenteController.php";
require_once __DIR__ . "/../../../src/service/docente/DocenteService.php";

$activityController = new ActivityController();
$activities = $activityController->handleRequest();

$activitiesFound = new ActivityService();

$unidadController = new UnidadAcademicaController();
$unidades = $unidadController->handleRequest();

$activitiesForUnit = new UnidadAcademicaService();

$instructores = new UserService();
$instructors = $instructores->getAllInstructors();

$activitiesForIns = new InstructorService();

$docenteController = new DocenteController();
$docentes = $docenteController->handleRequest();

$activitiesForDoc = new DocenteService();
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
                        <input type="radio" name="value-radio" value="year" onclick="document.getElementById('selectYear').style.display='block'; document.getElementById('selectInstructor').style.display='none'; document.getElementById('selectUnit').style.display='none'; document.getElementById('selectTeacher').style.display='none'; document.getElementById('selectGender').style.display='none';" />
                        <span class="name">Año</span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="value-radio" value="instructor" onclick="document.getElementById('selectYear').style.display='none'; document.getElementById('selectInstructor').style.display='block'; document.getElementById('selectUnit').style.display='none'; document.getElementById('selectTeacher').style.display='none'; document.getElementById('selectGender').style.display='none';" />
                        <span class="name">Instructor</span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="value-radio" value="unit" onclick="document.getElementById('selectYear').style.display='none'; document.getElementById('selectInstructor').style.display='none'; document.getElementById('selectUnit').style.display='block'; document.getElementById('selectTeacher').style.display='none'; document.getElementById('selectGender').style.display='none';" />
                        <span class="name">Unidad Académica</span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="value-radio" value="teacher" onclick="document.getElementById('selectYear').style.display='none'; document.getElementById('selectInstructor').style.display='none'; document.getElementById('selectUnit').style.display='none'; document.getElementById('selectTeacher').style.display='block'; document.getElementById('selectGender').style.display='none';" />
                        <span class="name">Docente</span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="value-radio" value="gender" onclick="document.getElementById('selectYear').style.display='none'; document.getElementById('selectInstructor').style.display='none'; document.getElementById('selectUnit').style.display='none'; document.getElementById('selectTeacher').style.display='none'; document.getElementById('selectGender').style.display='block';" />
                        <span class="name">Género</span>
                    </label>
                </div>

                <!-- Select Inputs -->
                <div class="d-flex justify-content-center align-items-center" style="min-height: 100px;">
                    <div id="selectYear" class="hidden-select">
                        <form class="d-flex align-items-center">
                            <select class="form-control" style="width: 300px;">
                                <option value="" disabled selected>Seleccione el año</option>
                                <?php foreach ($activities['anios'] as $anio):?>
                                    <option value="<?php $selectedYear = $anio['anio']?>">
                                        <?php echo $anio['anio']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <!-- Botón de búsqueda -->
                            <div id="searchBtnContainer" class="ml-3">
                                <button id="searchYearBtn" class="btn btn-primary searchBtn form-margin" onclick="<?php $acYear = $activitiesFound->queryForYear($selectedYear);?>">Buscar Por Año</button>
                            </div>
                        </form>
                    </div>

                    <div id="selectInstructor" class="hidden-select">
                        <form class="d-flex align-items-center">
                            <select class="form-control" style="width: 300px;">
                                <option value="" disabled selected>Seleccione el Instructor</option>
                                <?php foreach ($instructors as $instructor):?>
                                    <option value="<?php $insForAc = $instructor['idinstructor']?>">
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
                        <form class="d-flex align-items-center">
                            <select class="form-control" style="width: 300px;">
                                <option value="" disabled selected>Seleccione el Unidad Academica</option>
                                <?php foreach ($unidades as $unidad):?>
                                    <option value="<?php $selectedUnidad = $unidad['id']?>">
                                        <?php echo $unidad['nombre']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <!-- Botón de búsqueda -->
                            <div id="searchBtnContainer" class="ml-3">
                                <button id="searchUnitBtn" class="btn btn-primary searchBtn form-margin" onclick="<?php $acUnit = $activitiesForUnit->queryForUnit($selectedUnidad);?>">Buscar Por Unidad Academica</button>
                            </div>
                        </form>
                    </div>

                    <div id="selectTeacher" class="hidden-select">
                        <form class="d-flex align-items-center">
                            <select class="form-control" style="width: 300px;">
                                <option value="" disabled selected>Seleccione el Docente</option>
                                <?php foreach ($docentes as $docente):?>
                                    <option value="<?php $selectedDocente = $docente['iddocente']?>">
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
                        <form class="d-flex align-items-center">
                            <select class="form-control" style="width: 300px;">
                                <option value="" disabled selected>Seleccione la Actividad</option>
                                <?php foreach ($activities['actividades'] as $actividad):?>
                                    <option value="<?php $selectedActividad = $actividad['idactividad'] ?>">
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

                <!-- Tablas de resultados (solo se muestran para ejemplo, oculta o elimina según necesidad) -->
                <!-- Tabla de resultados por año y unidad acdemica -->
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
                        <?php if (isset($acYear)):?>
                            <?php foreach ($acYear as $ac):?>
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
                        <?php if (isset($acUnit)):?>
                            <?php foreach ($acUnit as $ac):?>
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
                        <?php if (isset($acForIns)):?>
                            <?php foreach ($acForIns as $acI):?>
                                <tr>
                                    <td><?php echo $acI['nombre']?></td>
                                    <td><?php echo $acI['fechaimp']?></td>
                                    <td><?php echo $acI['duracion']?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php else:?>
                            <tr>No hay datos</tr>
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
                        <?php if (isset($acDoc)):?>
                            <?php foreach ($acDoc as $acD):?>
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
                        <?php if (isset($acGender)):?>
                            <?php foreach ($acGender as $acG):?>
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

<script>
    document.getElementById("searchYearBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Evita que el formulario se envíe
        document.getElementById("resultTableYear").style.display = "block";
        document.getElementById("resultTableUnit").style.display = "none";
        document.getElementById("resultTableInstructor").style.display = "none";
        document.getElementById("resultTableGender").style.display = "none";
        document.getElementById("resultTableDocente").style.display = "none";
        // Ocultar otras tablas según sea necesario
    });

    document.getElementById("searchUnitBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Evita que el formulario se envíe
        document.getElementById("resultTableYear").style.display = "none";
        document.getElementById("resultTableUnit").style.display = "block";
        document.getElementById("resultTableInstructor").style.display = "none";
        document.getElementById("resultTableGender").style.display = "none";
        document.getElementById("resultTableDocente").style.display = "none";
        // Ocultar otras tablas según sea necesario
    });

    document.getElementById("searchInsBtn").addEventListener("click" ,function (event) {
        event.preventDefault();
        document.getElementById("resultTableYear").style.display = "none";
        document.getElementById("resultTableUnit").style.display = "none";
        document.getElementById("resultTableInstructor").style.display = "block";
        document.getElementById("resultTableGender").style.display = "none";
        document.getElementById("resultTableDocente").style.display = "none";
    })

    document.getElementById("searchGenderBtn").addEventListener("click" ,function (event) {
        event.preventDefault();
        document.getElementById("resultTableYear").style.display = "none";
        document.getElementById("resultTableUnit").style.display = "none";
        document.getElementById("resultTableInstructor").style.display = "none";
        document.getElementById("resultTableGender").style.display = "block";
        document.getElementById("resultTableDocente").style.display = "none";
    })

    document.getElementById("searchDocBtn").addEventListener("click" ,function (event) {
        event.preventDefault();
        document.getElementById("resultTableYear").style.display = "none";
        document.getElementById("resultTableUnit").style.display = "none";
        document.getElementById("resultTableInstructor").style.display = "none";
        document.getElementById("resultTableGender").style.display = "none";
        document.getElementById("resultTableDocente").style.display = "block";
    })
</script>
</body>
</html>
