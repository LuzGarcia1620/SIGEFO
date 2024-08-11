<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/asistencia.css" />
    <link rel="stylesheet" href="../../assets/css/styles.css" />
</head>

<body>

    <div class="container-fluid">
        <div>
    <?php include __DIR__ . '/../../templates/header.html'; ?>
    </div>
        <div class="row">

            <!-- Navegación Vertical -->
            <div class="col-md-2">
               <div>
               <?php include __DIR__ . '/../../templates/menuInstructor.php'; ?>
               </div>
            </div>

            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <div class="titulo">Asistencia</div>

                <!-- este es el select a cambiar, pero dejale el js-->
                <div class=" text-center">
                    <select id="mainSelect" >
                        <option value="">Seleccionar la opción deseada</option>
                        <option value="ver">Ver lista</option>
                    </select>
                    <br>

                    <select id="actividadSelect">
                        <option>Seleccione la actividad</option>
                        <!-- Otras opciones si es necesario -->
                    </select>
                </div>
                <div class="line"></div>
                <br>

                <div id="content" class="text-center ">
                    <!-- El contenido dinámico se cargará aquí -->
                </div>
            </div>

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
