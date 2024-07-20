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
    <?php include dirname ( dirname (__DIR__ . '/webapp/templates/header.html')) ; ?>
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
                <li><a href="">Acceso a Plataforma</a></li>
                <li><a href="">Actividades Formativas</a></li>
                <li><a href="">Galería</a></li>
                <li><a href="">Descargar constancia</a></li>
            </ul>
        </li>
        <li><a href="">Documentos de Consulta</a></li>
        <li><a href="">Contacto</a></li>
    </ul>
</nav>
<!-- Fin de la NavBar -->

<div class="container mt-4">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-2 d-flex justify-content-center">
            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    La Universidad Autónoma del Estado de Morelos, la Secretaría Académica a través de la Dirección General de Educación Superior
                </div>
                <div class="card-body card-body-custom">
                    <h5 class="card-title">Invita al Curso-Taller</h5>
                    <h2 class="card-text">Desarrollo de actividades dentro del aula</h2>
                    <p class="card-text">Dirigido al Personal Académico de la UAEM</p>
                </div>
                <div class="card-footer card-footer-custom">
                    <a href="/SIGEFO/informacion" class="btn btn-custom">Ver más información</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 d-flex justify-content-center">
            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    La Universidad Autónoma del Estado de Morelos, la Secretaría Académica a través de la Dirección General de Educación Superior
                </div>
                <div class="card-body card-body-custom">
                    <h5 class="card-title">Invita al</h5>
                    <h2 class="card-text">Desarrollo de actividades dentro del aula</h2>
                    <p class="card-text">Dirigido al Personal Académico de la UAEM</p>
                </div>
                <div class="card-footer card-footer-custom">
                    <a href="SIGEFO/informacion" class="btn btn-custom">Ver más información</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 d-flex justify-content-center">
            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    La Universidad Autónoma del Estado de Morelos, la Secretaría Académica a través de la Dirección General de Educación Superior
                </div>
                <div class="card-body card-body-custom">
                    <h5 class="card-title">Invita al</h5>
                    <h2 class="card-text">Desarrollo de actividades dentro del aula</h2>
                    <p class="card-text">Dirigido al Personal Académico de la UAEM</p>
                </div>
                <div class="card-footer card-footer-custom">
                    <a href="SIGEFO/informacion" class="btn btn-custom">Ver más información</a>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <div>
    <?php include __DIR__ . '/templates/footerPublico.html' ?>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="SIGEFO/webapp/assets/js/formaciondocente.js"></script>
</body>

</html>