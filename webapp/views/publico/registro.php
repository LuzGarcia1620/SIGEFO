<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/registro.css"/>
    <title>Registro</title>
</head>
<body>
<?php
require_once __DIR__ . "/../../../src/controller/docente/DocenteController.php";
require_once __DIR__ . "/../../../src/controller/profile/ProfileController.php";
require_once __DIR__ . "/../../../src/controller/unidadAcademica/UnidadAcademicaController.php";
require_once __DIR__ . "/../../../src/controller/activity/ActivityController.php";

$docenteController = new DocenteController();
$profileController = new ProfileController();
$unidadController = new UnidadAcademicaController();
$activityController = new ActivityController();

$profiles = $profileController->handleRequest();
$unidades = $unidadController->handleRequest();
$actividad = $activityController->handleRequest();
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
<a href="/SIGEFO/informacion" class="regresar">Regresar</a>

<div class="container d-flex justify-content-center align-items-center form-section mb-5">
    <div class="form-container">
            <p class="form-title">Registrese en <?php echo isset($actividad) ? $actividad['nombreactividad'] : null ?></p>
            <p class="form-sub-title">Ingrese su correo electrónico</p>
            <form method="get" action="/SIGEFO/registroActividad">
            <div class="mb-3">
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico" required>
            </div>
                <input type="hidden" name="actividad" value="<?php echo $actividad['idactividad'] ?>">
                <button type="submit" class="btn btn-primary w-100"><a >Registrarse</a></button>
            </form>
    </div>
</div>



<div>
    <?php include __DIR__ . '/../../templates/footerPublico.html'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/SIGEFO/webapp/assets/js/bootstrap.bundle.min.js"></script>
<script src="/SIGEFO/webapp/assets/js/registro.js"></script>

<script>
/*$(document).ready(function() {
    $('#email-form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire({
                        title: 'OjoDocente',
                        text: "Usted ya está registrado",
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir al formulario de inscripción (cargar datos del docente)
                            $('.form-section').show();
                            $('#email-form').hide();
                        }
                    });
                } 
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'No se encontraron sus datos',
                    text: "¿Desea registrarse?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deseo registrarme'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mostrar el formulario de registro vacío
                        $('.form-section').show();
                        $('#email-form').hide();
                    }
                });
            }
        });
    });
});*/
</script>
</body>
</html>
