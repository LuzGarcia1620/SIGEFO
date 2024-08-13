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
                <div class="">
                    <?php include __DIR__ . '/../../templates/menuSuperAdmin.php'; ?>
                </div>
            </nav>

            <!-- Contenido Principal -->
            <div class=" col-lg-10 ">
                <div class="titulo">Asistencias</div>

                <!-- Formulario para agregar fecha de asistencia -->
                <form id="agregar-fecha-form" class="mb-3">
                    <div class="d-flex align-items-center">
                        <div class="mr-2">
                            <label for="fechaAsistencia" class="sr-only">Fecha de Asistencia</label>
                            <input type="date" class="calendar mb-2 form-control" id="fechaAsistencia" placeholder="Fecha de Asistencia" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Agregar Fecha</button>
                    </div>
                     <!-- Botón para agregar trabajos -->
                <button id="agregar-trabajo-btn" type="button" class="btn btn-success mb-3">Agregar Trabajo</button>
                <div class="divider-line"></div>
                <br>
                </form>

               

                <!-- Tabla de Asistencias y Trabajos -->
                <div class="tabla">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="name">Nombre Participante</th>
                                <th class="moodleuser">Usuario Moodle</th>
                                <th class="moodlepass">Contraseña Moodle</th>
                                <!-- Encabezados dinámicos para las fechas de asistencia se añadirán aquí -->
                                <th class="evaluacion">Evaluación</th>
                                <th class="coment">Comentarios</th>
                                <th class="edit">Edición</th>
                            </tr>
                        </thead>
                        <tbody id="tablaAsistenciaBody">
                            <tr>
                                <td>Juan Pérez</td>
                                <td>jperez</td>
                                <td>123456</td>
                                <!-- Celdas dinámicas para marcar asistencia se añadirán aquí -->
                                <td>90%</td>
                                <td>Excelente</td>
                                <td><button class="btn btn-warning">Editar</button></td>
                            </tr>
                            <!-- Más filas de ejemplo -->
                            <tr>
                                <td>Maria López</td>
                                <td>mlopez</td>
                                <td>abcdef</td>
                                <td>85%</td>
                                <td>Buena participación</td>
                                <td><button class="btn btn-warning">Editar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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