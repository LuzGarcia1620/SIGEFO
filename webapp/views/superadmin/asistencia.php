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

    <div id="headerContainer"></div>
    <div class="container-fluid">
        <div class="row">

            <!-- Navegación Vertical -->
            <div class="col-md-2">
                <div class="navback">
                    <ul class="list-unstyled vertical-nav">
                        <li><a href="perfil.php" class="btn btn-block my-1 menu">Perfil</a></li>
                        <li><a href="/webapp/views/superadmin/actividades.php"
                                class="btn btn-primary btn-block my-1 menu">Actividad Formativa</a></li>
                        <li><a href="/webapp/views/superadmin/usuarios.php"
                                class="btn btn-primary btn-block my-1 menu">Usuarios</a></li>
                        <li><a href="/webapp/views/superadmin/consultas.php"
                                class="btn btn-primary btn-block my-1 menu">Consultas</a></li>
                        <li><a href="/webapp/views/superadmin/asistencia.php"
                                class="btn btn-primary btn-block my-1 menu">Asistencia</a></li>
                        <li><a href="login.php" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <div class="titulo">Asistencia</div>

                <div class="form-group text-center">
                    <select class="form-control mb-3">
                        <option>Subir lista</option>
                        <!-- Otras opciones si es necesario -->
                    </select>

                    <select class="form-control mb-4">
                        <option>Seleccione la actividad</option>
                        <!-- Otras opciones si es necesario -->
                    </select>
                </div>
                <div class="line"></div>

                <div class="card mx-auto" style="max-width: 500px;">
                    <div class="card-header bg-white text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25"
                            height="25" viewBox="0 0 512 419.116">
                            <defs>
                                <clipPath id="clip-folder-new">
                                    <rect width="512" height="419.116"></rect>
                                </clipPath>
                            </defs>
                            <g id="folder-new" clip-path="url(#clip-folder-new)">
                                <path id="Union_1" data-name="Union 1"
                                    d="M16.991,419.116A16.989,16.989,0,0,1,0,402.125V16.991A16.989,16.989,0,0,1,16.991,0H146.124a17,17,0,0,1,10.342,3.513L227.217,57.77H437.805A16.989,16.989,0,0,1,454.8,74.761v53.244h40.213A16.992,16.992,0,0,1,511.6,148.657L454.966,405.222a17,17,0,0,1-16.6,13.332H410.053v.562ZM63.06,384.573H424.722L473.86,161.988H112.2Z"
                                    fill="var(--c-action-primary)" stroke="" stroke-width="1"></path>
                            </g>
                        </svg>
                        <h5 class="card-title mt-2">Subir Lista</h5>
                    </div>
                    <div class="card-body text-center">
                        <button class="upload-area btn btn-outline-secondary w-100 py-5">
                            <span class="upload-area-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="35" height="35" viewBox="0 0 340.531 419.116">
                                    <g id="files-new" clip-path="url(#clip-files-new)">
                                        <path id="Union_2" data-name="Union 2"
                                            d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z"
                                            transform="translate(2944 428)" fill="var(--c-action-primary)"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="upload-area-title d-block mt-3">Arrastre los archivos a subir</span>
                            <span class="upload-area-description d-block">Puede subir sus archivos dando
                                <br /><strong>Click aquí</strong></span>
                        </button>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success">Subir</button>
                    </div>
                </div>
            </div>

        </div>


        <!-- Footer -->
        <footer class="footer">
            <p>Departamento de Formación Docente</p>
            <p>Av. Universidad 1001 Col. Chamilpa C.P. 62209, Cuernavaca, Morelos</p>
        </footer>

        <script>
        fetch("../../templates/header.html")
            .then((response) => response.text())
            .then((data) => {
                document.getElementById("headerContainer").innerHTML = data;
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>