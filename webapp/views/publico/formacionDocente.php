    <?php
    require __DIR__ . "/../../../src/controller/activity/ActivityController.php";

    $activityController = new ActivityController();
    $activities = $activityController->handleRequest();
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
        <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/formaciondocente.css" />

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

        <div class="container">
            <div class="row">
                <?php if (empty($activities)): ?>
                <div class="col-12">
                    <div class= "actividadesanuncio">
                        <p>¡Aún no tenemos actividades disponibles!</p> 
                    </div>
                   
                </div>
                <?php else: ?>
                <?php foreach ($activities as $activity): ?>
                <?php if ($activity['status']): ?>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card card-custom">
                        <div class="card-header card-header-custom">
                            La Universidad Autónoma del Estado de Morelos,
                            la Secretaría Académica a través de la Dirección
                            General de Educación Superior
                        </div>
                        <div class="card-body card-body-custom">
                            <h2 class="card-title">Invita a <?php echo $activity['modalidad']?></h2>
                            <h1 class="card-text"><?php echo $activity['nombreactividad'] ?></h1>
                            <p class="card-text">Dirigido a <?php echo $activity['dirigidoa'] ?></p>
                            <form method="get" action="/SIGEFO/informacion">
                                <input type="hidden" name="actividad" value="<?php echo $activity['idactividad'] ?>">
                                <button type="submit" class="inscriptionbtn"><a>Ver más Información</a></button>
                            </form>

                        </div>

                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!--Footer-->
        <div>
            <?php include __DIR__ . '/../../templates/footerPublico.html'; ?>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="SIGEFO/webapp/assets/js/formaciondocente.js"></script>
    </body>

    </html>