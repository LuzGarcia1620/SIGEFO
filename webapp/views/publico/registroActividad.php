<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/registroActividad.css"/>
    <title>Registro</title>
</head>
<body>
<?php
require_once __DIR__ . "/../../../src/controller/docente/DocenteController.php";
require_once __DIR__ . "/../../../src/controller/profile/ProfileController.php";
require_once __DIR__ . "/../../../src/controller/unidadAcademica/UnidadAcademicaController.php";

$docenteController = new DocenteController();
$profileController = new ProfileController();
$unidadController = new UnidadAcademicaController();

$idActividad = $_GET["actividad"];

$docente = $docenteController->handleRequest();
$unidades = $unidadController->handleRequest();
$profiles = $profileController->handleRequest();

?>
<div>
    <?php include __DIR__ . '/../../templates/header.html'; ?>
</div>
<!-- NavBAR -->
<nav class="dropdownmenu">
    <ul>
        <li><a href="">Inicio</a></li>
        <li><a href="">Evaluación Docente</a>
            <ul id="submenu">
                <li><a href="">Instrumento de evaluacion docente</a></li>
                <li><a href="">Cronograma</a></li>
                <li><a href="">Fechas de aplicación</a></li>
                <li><a href="">Reporte de Resultados</a></li>
                <li><a href="">Monitoreo</a></li>
            </ul>
        </li>
        <li><a href="#">Formación Docente</a>
            <ul id="submenu">
                <li><a href="/SIGEFO/login">Acceso a Plataforma</a></li>
                <li><a href="/SIGEFO/">Actividades Formativas</a></li>
                <li><a href="">Galería</a></li>
                <li><a href="">Descargar constancia</a></li>
            </ul>
        </li>
        <li><a href="">Documentos de Consulta</a></li>
        <li><a href="">Contacto</a></li>
    </ul>
</nav>
<!-- Fin de la NavBar -->
<a href="/SIGEFO/registro" class="regresar">Regresar</a>

<div class="form-section">
    <div class="form-container">
        <div class="titulo">Registro</div>
                <div class="divider-line"></div>

        <form class="form" method="POST" id="formDocenteSave" action="/src/controller/docente/DocenteController.php">
            <div class="input-field">
                <input required autocomplete="off" type="text" name="nombre" id="nombre" value="<?php echo isset($docente) ? $docente['nombre'] : null?>" />
                <label for="nombre">Nombre(s)</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="paterno" id="apellidoPaterno" value="<?php echo isset($docente) ? $docente['paterno'] : null?>" />
                <label for="apellidoPaterno">Apellido Paterno</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="materno" id="apellidoMaterno" value="<?php echo isset($docente) ? $docente['materno'] : null?>" />
                <label for="apellidoMaterno">Apellido Materno</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="sexo" id="sexo" value="<?php echo isset($docente) ? $docente['sexo'] : null?>" />
                <label for="sexo">Sexo</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="number" name="edad" id="edad" value="<?php echo isset($docente) ? $docente['edad'] : null?>" />
                <label for="edad">Edad</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="email" name="correo" id="correo" value="<?php echo isset($docente) ? $docente['correo'] : null?>" />
                <label for="correo">Correo Electrónico</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="grado" id="grado" value="<?php echo isset($docente) ? $docente['grado'] : null?>" />
                <label for="grado">Grado</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="disciplina" id="disciplina" value="<?php echo isset($docente) ? $docente['disciplina'] : null?>" />
                <label for="disciplina">Disciplina</label>
            </div>
            <div class="input-field">
                <select id="unidad" name="unidad" required>
                    <option value="" disabled selected>Seleccione su Unidad Académica<?php echo isset($docente) ? $docente['unidad'] : null?></option>
                    <?php foreach ($unidades as $unidad): ?>
                        <option value="<?php echo $unidad['id'] ?>">
                            <?php echo $unidad['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-field">
                <select id="perfil" name="perfil" required>
                    <option value="" disabled selected>S<?php echo isset($docente) ? $docente['perfil'] : null?></option>
                    <?php foreach ($profiles as $profile): ?>
                        <option value="<?php echo $profile['id'] ?>">
                            <?php echo $profile['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-field">
                <p for="tresanios">En los últimos 3 años, ¿Ha tomado alguna actividad formativa organizada por el Departamento de Formación Docente?</p>
                <select id="tresanios" name="tresanios" required>
                    <option value="" disabled selected><?php echo isset($docente) ? $docente['tresanios'] : null?></option>
                    <option value="true">Si, he tomado actividades anteriormente</option>
                    <option value="true">No, nada</option>
                </select>
            </div>
            <input type="hidden" name="flag" id="flag" value="<?php echo isset($docente) ?>" />
            <input type="hidden" name="action" id="action" value="<?php echo isset($docente) ? 'update' : 'save'?>"/>
            <input type="hidden" name="idactividad" id="idactividad" value="<?php echo $idActividad ?>"/>
            <input type="hidden" name="iddocente" id="iddocente" value="<?php echo isset($docente) ? $docente['iddocente'] : null ?>"/>
            <div class="btn-container">
                <button type="submit" class="btn">Enviar</button>
            </div>
        </form>
    </div>
</div>

<!-- Fin de la NavBar -->

<div>
    <?php include __DIR__ . '/../../templates/footerPublico.html'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/SIGEFO/webapp/assets/js/bootstrap.bundle.min.js"></script>
<script src="/SIGEFO/webapp/assets/js/registroactividad.js"></script>


</body>
</html>

