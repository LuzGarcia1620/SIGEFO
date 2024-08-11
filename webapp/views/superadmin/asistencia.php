<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Asistencia</title>
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/asistencia.css" />
</head>

<body>
    <div>
        <?php include __DIR__ . '/../../templates/header.html'; ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <?php include __DIR__ . '/../../templates/menuSuperAdmin.php'; ?>
                </div>
            </nav>

            <!-- Contenido Principal -->
            <main role="main" class="col-lg-10">
                <div class="titulo">Asistencia</div>
                <br>
                <div class="box">
                    <select class="form-control mb-3">
                        <option value="">Seleccionar la opción deseada</option>
                        <option value="subir">Subir lista</option>
                        <option value="ver">Ver lista</option>
                    </select>
                    <select class="form-control">
                        <option>Seleccione la actividad</option>
                        <!-- Otras opciones si es necesario -->
                    </select>
                </div>

                <div class="line mt-3"></div>
                <br>

                <div id="content" class="text-center">
                    <!-- El contenido dinámico se cargará aquí -->
                </div>
            </main>
        </div>
        <!--Footer-->
        <div>
            <?php include __DIR__ . '/../../templates/footer.html'; ?>
        </div>
        <!-- FIN Footer -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="/SIGEFO/webapp/assets/js/asistencia.js"></script>

</body>

</html>