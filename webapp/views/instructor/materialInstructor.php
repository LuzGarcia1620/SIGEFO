<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Material</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/asistencia.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
</head>

<body>
    <div>
        <?php include __DIR__ . '/../../templates/header.html'; ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navegación Vertical -->
            <div class="col-lg-2">
                <div>
                    <?php include __DIR__ . '/../../templates/menuInstructor.php'; ?>
                </div>
            </div>

            
            <!-- Contenido Principal -->
            <div class="col-lg-10">
                <div class="titulo">Material</div>
                <div class="line"></div>

                <div class="card mx-auto" style="max-width: 400px;">
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
                        <h5 class="card-title mt-2">Subir Material para Actividad Formativa</h5>
                    </div>
                    <div class="card-body text-center">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control mb-3">
                            <button type="submit" class="btn btn-success">Subir</button>
                        </form>
                    </div>
                </div>

                <!-- Sección para mostrar archivos subidos -->
                <div class="card mx-auto" style="max-width: 400px; margin-top: 20px;">
                    <div class="card-header bg-white text-center">
                        <h5 class="card-title mt-2">Archivos Subidos</h5>
                    </div>
                    <div class="card-body text-center">
                        <select class="form-control" id="uploadedFiles">
                            <option value="">Seleccione un archivo</option>
                            <?php
                            $directory = 'uploads/';
                            $files = scandir($directory);
                            foreach ($files as $file) {
                                if ($file !== '.' && $file !== '..') {
                                    echo "<option value=\"$directory$file\">$file</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div>
            <?php include __DIR__ . '/../../templates/footer.html'; ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="/SIGEFO/webapp/assets/js/materialInstructor.js"></script>
</body>

</html>
