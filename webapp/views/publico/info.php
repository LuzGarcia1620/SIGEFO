<?php
require __DIR__ . "/../../../src/controller/activity/ActivityController.php";

$activityController = new ActivityController();
$activity = $activityController->handleRequest();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/info.css" />
    <title>Formación Docente</title>
</head>

<body>
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

    <!-- Botón de Regresar -->
    <a href="/SIGEFO/" class="regresar">Regresar</a>
    <br>

    <!-- Contenido principal -->
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-3 shadow-md">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="/SIGEFO/webapp/assets/img/curso.png" class="img-fluid rounded-start" alt="Img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $activity['nombreactividad'] ?></h1>
                        <br>
                        <p>Dirigido a <?php echo $activity['dirigidoa'] ?></p>
                        <br>
                        <p>Objetivo: <?php echo $activity['objetivo'] ?></p>
                        <br>
                        <p>Instructor: <?php echo $activity['nombre'] . " " . $activity['paterno'] . " " . $activity['materno'] ?></p>
                        <br>
                        <p>Modalidad: <?php echo $activity['modalidad'] ?></p>
                        <br>
                        <p>Fecha de inicio: <?php echo $activity['fechaimp'] ?></p>
                        <br>
                        <p>Horario: <?php echo $activity['horaimp'] ?> am</p>
                        <br>
                        <div class="text-end">
                        <form method="get" action="/SIGEFO/registro">
                                       <input type="hidden" name="actividad" value="<?php echo $activity['idactividad'] ?>">
                                        <button type="submit" class="inscriptionbtn"><a >¡Registrate aquí!</a></button>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <div>
        <?php include __DIR__ . '/../../templates/footerPublico.html'; ?>
    </div>

    <!-- Scripts -->
    <script src="/SIGEFO/webapp/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>