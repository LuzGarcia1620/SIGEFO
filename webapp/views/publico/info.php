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

<!-- Card -->
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-3 shadow-md">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="/SIGEFO/webapp/assets/img/curso.png" class="img-fluid rounded-start" alt="Img">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h6 class="card-title">Desarrollo de actividades dentro del aula</h6>
                    <p>Dirigido a:</p>
                    <p>Objetivo:</p>
                    <p>Imparte:</p>
                    <p>Modalidad:</p>
                    <p>Fecha:</p>
                    <p>Horario:</p>
                    <div class="text-end">
                        <a href="/SIGEFO/registro" class="btn btn-primary">¡Inscríbete aquí!</a>
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

    <script>
    /*fetch('../../templates/header.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('headerContainer').innerHTML = data;
        });
    fetch('../../templates/footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footerContainer').innerHTML = data;
        });*/
    </script>

</body>

</html>