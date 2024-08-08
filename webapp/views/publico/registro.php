<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../webapp/assets/css/styles.css"/>
    <link rel="stylesheet" href="/../webapp/assets/css/registro.css"/>
    <title>Registro</title>
</head>
<body>
<?php
require_once __DIR__ . "/../../../src/controller/docente/DocenteController.php";
require_once __DIR__ . "/../../../src/controller/profile/ProfileController.php";
require_once __DIR__ . "/../../../src/controller/unidadAcademica/UnidadAcademicaController.php";
require_once __DIR__ . "/../../../src/service/docente/DocenteService.php";

$docenteController = new DocenteController();
$docente = $docenteController->handleRequest();

$profileController = new ProfileController();
$profiles = $profileController->handleRequest();
$profiles = isset($profiles) ? $profiles : array();

$unidadController = new UnidadAcademicaController();
$unidades = $unidadController->handleRequest();
$unidades = isset($unidades) ? $unidades : array();

$email = isset($_GET['correo']);

$docenteService = new DocenteService();
$docente = $docenteService->validateEmail($email);

?>
<div>
    <?php include __DIR__ . '/../../templates/header.html'; ?>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./evaluaciondocente.php">Evaluación Docente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./formaciondocente.php">Formación Docente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./documentosconsulta.php">Documentos de Consulta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contacto.php">Contacto</a>
                </li>
            </ul>
            <a class="navbar-brand ms-auto" href="./index.php">UAEM</a>
        </div>
    </div>
</nav>

<a href="/SIGEFO/informacion" class="regresar">Regresar</a>
<br>

<div class="container d-flex justify-content-center align-items-center form-section">
    <div class="form-container p-4 shadow-sm rounded">
        <form id="email-form" method="GET" action="/SIGEFO/registro" target="_self">
            <p class="form-title">Desarrollo de actividades dentro del aula</p>
            <p class="form-sub-title">Ingrese su correo electrónico</p>
            <div class="mb-3">
                <input type="correo" class="form-control" id="correo" name="correo" placeholder="Correo electrónico"
                       required>
                <!--<input type="hidden" name="action" value="validateEmail">-->
            </div>
            <button type="submit" class="btn btn-primary w-100">Continuar</button>

        </form>
    </div>
</div>

<div class="form-section" style="display: none;">
    <div class="container">
        <div class="heading">Registro</div>
        <form class="form" action="">
            <div class="input-field">
                <input
                        required=""
                        autocomplete="off"
                        type="text"
                        name="nombre"
                        id="name"
                        value="<?php echo isset($docente) ? $docente['nombre'] : null ?>"
                />
                <label for="name">Nombre(s)</label>
            </div>
            <div class="input-field">
                <input
                        required=""
                        autocomplete="off"
                        type="text"
                        name="paterno"
                        id="apellidoPaterno"
                        value="<?php echo isset($docente) ? $docente['paterno'] : null ?>"
                />
                <label for="username">Apellido Paterno</label>
            </div>
            <div class="input-field">
                <input
                        required=""
                        autocomplete="off"
                        type="text"
                        name="materno"
                        id="apellidoMaterno"
                        value="<?php echo isset($docente) ? $docente['materno'] : null ?>"
                />
                <label for="username">Apellido Materno</label>
            </div>
            <div class="input-field">
                <input
                        required=""
                        autocomplete="off"
                        type="text"
                        name="sexo"
                        id="sexo"
                        value="<?php echo isset($docente) ? $docente['sexo'] : null ?>"
                />
                <label for="username">Sexo</label>
            </div>
            <div class="input-field">
                <input
                        required=""
                        autocomplete="off"
                        type="number"
                        name="edad"
                        id="edad"
                        value="<?php echo isset($docente) ? $docente['edad'] : null ?>"
                />
                <label for="username">Edad</label>
            </div>
            <div class="input-field">
                <input
                        required=""
                        autocomplete="off"
                        type="email"
                        name="email"
                        id="email"
                        value="<?php echo isset($docente) ? $docente['correo'] : null ?>"
                />
                <label for="email">Correo Electronico</label>
            </div>
            <div class="input-field">
                <input
                        required=""
                        autocomplete="off"
                        type="text"
                        name="grado"
                        id="grado"
                        value="<?php echo isset($docente) ? $docente['grado'] : null ?>"
                />
                <label for="grado">Grado</label>
            </div>
            <div class="input-field">
                <input
                        required=""
                        autocomplete="off"
                        type="text"
                        name="disciplina"
                        id="disciplina"
                        value="<?php echo isset($docente) ? $docente['disciplina'] : null ?>"
                />
                <label for="disciplina">Disciplina</label>
            </div>
            <div class="input-field">
                <select id="unidad" name="unidad" required>
                    <option value="" disabled selected><?php echo isset($docente) ? $docente['unidad'] : null ?></option>
                    <?php foreach ($unidades as $unidad): ?>
                        <option value="<?php echo $unidad['id'] ?>">
                            <?php echo $unidad['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-field">
                <select id="perfil" name="perfil" required>
                    <option value="" disabled selected><?php echo isset($docente) ? $docente['perfil'] : null ?></option>
                    <?php foreach ($profiles as $profile): ?>
                        <option value="<?php echo $profile['id'] ?>">
                            <?php echo $profile['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            En los últimos 3 años, ¿Ha tomado alguna actividad formativa: curso, taller, curso-taller, conferencia,
            seminarios organizado por el Departamento de Formación Docente?

            <div class="btn-container">
                <button class="btn">Submit</button>
            </div>
        </form>
    </div>
</div>

<footer class="bg-custom-footer py-2">
    <?php include __DIR__ . '/../../templates/footerPublico.html'; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/../webapp/assets/js/bootstrap.bundle.min.js"></script>
<script src="/../webapp/assets/js/registro.js"></script>
</body>
</html>
