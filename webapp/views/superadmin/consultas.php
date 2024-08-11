<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/consultas.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
</head>

<body>

    <?php
    require __DIR__ . "/../../../src/controller/user/UserController.php";
    $userController = new UserController();
    $users = $userController->handleRequest();
    ?>

    <div>
        <?php include __DIR__ . '/../../templates/header.html'; ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- menu -->
            <div class="col-md-2 d-none d-md-block bg-light sidebar">
                <div>
                    <?php include __DIR__ . '/../../templates/menuSuperAdmin.php'; ?>
                </div>
            </div>
            <!-- Contenido Principal -->
            <div class="col-lg-10" >
                <div class="containercons">
                    <div class="tittle">Consultas</div>

                    <div class="radio-input">
                        <label>
                            <input type="radio" id="value-1" name="value-radio" value="year" onchange="showInput(this.value)" />
                            <span class="name">Año</span>
                        </label>
                        <label class="radio">
                            <input type="radio" id="value-2" name="value-radio" value="instructor" onchange="showInput(this.value)" />
                            <span class="name">Instructor</span>
                        </label>
                        <label class="radio">
                            <input type="radio" id="value-3" name="value-radio" value="unit" onchange="showInput(this.value)" />
                            <span class="name">Unidad Académica</span>
                        </label>
                        <label class="radio">
                            <input type="radio" id="value-4" name="value-radio" value="teacher" onchange="showInput(this.value)" />
                            <span class="name">Docente</span>
                        </label>
                        <label class="radio">
                            <input type="radio" id="value-5" name="value-radio" value="gender" onchange="showInput(this.value)" />
                            <span class="name">Género</span>
                        </label>
                    </div>

                    <!-- Select Input -->
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 100px;">
                        <div id="staticInputContainer" class="input-container select-margin">
                            <select id="dynamicSelect" class="form-control" style="width: 300px;">
                            </select>
                        </div>
                         <!-- Botón de búsqueda -->
                         <div id="searchBtnContainer" class="ml-3">
                            <button id="searchBtn" class="btn btn-primary searchBtn" onclick="showResults()">Buscar</button>
                        </div>
                    </div>
                    <div class="divider-line"></div>
                    <br>

                    <input placeholder="Buscar" type="search" class="input">
                    <br>

                    <!-- Tabla de resultados -->
                    <div>
                        <div id="resultTable" class="table-responsive mt-4" style="display: none;">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Instructor</th>
                                        <th>Fecha</th>
                                        <th>Duración</th>
                                        <th>Categoría</th>
                                        <th>Tipo</th>
                                        <th>N° Participantes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Desarrollo de actividades dentro del aula</td>
                                        <td>María Delgado Méndez</td>
                                        <td>10 de enero de 2024</td>
                                        <td>15 hrs</td>
                                        <td>Capacitación</td>
                                        <td>Taller</td>
                                        <td>86</td>
                                    </tr>
                                    <!-- Más registros aquí -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <div>
        <?php include __DIR__ . '/../../templates/footer.html'; ?>
    </div>

    <script src="/SIGEFO/webapp/assets/js/consultas.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
