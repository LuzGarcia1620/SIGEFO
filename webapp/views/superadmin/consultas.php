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
            <div class="col-lg-10">
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
                            <select id="dynamicSelect" class="form-control" style="width: 300px;"></select>
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

                    <!-- Tabla de resultados por año -->
                    <div id="resultTableYear" class="table-responsive mt-4" style="display: none;">
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
                                <!-- Aquí irán los datos -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabla de resultados por instructor -->
                    <div id="resultTableInstructor" class="table-responsive mt-4" style="display: none;">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Instructor</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí irán los datos -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabla de resultados por unidad académica (similar a año) -->
                    <div id="resultTableUnit" class="table-responsive mt-4" style="display: none;">
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
                                <!-- Aquí irán los datos -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabla de resultados por docente (similar a instructor) -->
                    <div id="resultTableTeacher" class="table-responsive mt-4" style="display: none;">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Instructor</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí irán los datos -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabla de resultados por género -->
                    <div id="resultTableGender" class="table-responsive mt-4" style="display: none;">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Total Hombres</th>
                                    <th>Total Mujeres</th>
                                    <th>Total General</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí irán los datos -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <div>
        <?php include __DIR__ . '/../../templates/footer.html'; ?>
    </div>

</body>
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Tu script personalizado -->
<script src="/SIGEFO/webapp/assets/js/consultas.js"></script>

<script>
    function showInput(type) {
        const select = document.getElementById('dynamicSelect');
        let options = [];
        switch (type) {
            case 'year':
                options = [
                    '<option value="">Seleccione el año</option>',
                    // Agrega más opciones aquí
                ];
                break;
            case 'instructor':
                options = [
                    '<option value="">Seleccione el instructor</option>',
                    // Agrega más opciones aquí
                ];
                break;
            case 'unit':
                options = [
                    '<option value="">Seleccione la unidad académica</option>',
                    // Agrega más opciones aquí
                ];
                break;
            case 'teacher':
                options = [
                    '<option value="">Seleccione el docente</option>',
                    // Agrega más opciones aquí
                ];
                break;
            case 'gender':
                options = [
                    '<option value="">Seleccione el género</option>',
                    '<option value="masculino">Masculino</option>',
                    '<option value="femenino">Femenino</option>'
                ];
                break;
        }

        select.innerHTML = options.join('');
        document.getElementById("searchBtnContainer").style.display = 'block';
    }

    function showResults() {
        // Oculta todas las tablas primero
        document.getElementById("resultTableYear").style.display = 'none';
        document.getElementById("resultTableInstructor").style.display = 'none';
        document.getElementById("resultTableUnit").style.display = 'none';
        document.getElementById("resultTableTeacher").style.display = 'none';
        document.getElementById("resultTableGender").style.display = 'none';

        // Muestra la tabla correcta según la selección
        const selectedValue = document.querySelector('input[name="value-radio"]:checked').value;
        switch (selectedValue) {
            case 'year':
                document.getElementById("resultTableYear").style.display = 'block';
                break;
            case 'instructor':
                document.getElementById("resultTableInstructor").style.display = 'block';
                break;
            case 'unit':
                document.getElementById("resultTableUnit").style.display = 'block';
                break;
            case 'teacher':
                document.getElementById("resultTableTeacher").style.display = 'block';
                break;
            case 'gender':
                document.getElementById("resultTableGender").style.display = 'block';
                break;
        }
    }
</script>
</html>
