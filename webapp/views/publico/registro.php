<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webapp/assets/css/styles.css" />
    <link rel="stylesheet" href="../webapp/assets/css/registro.css" />
    <title>Registro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div>
    <?php include __DIR__ . '/../../templates/header.html'; ?>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./evaluaciondocente.php">Evaluación Docente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./formaciondocente.php">Formación Docente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./documentosconsulta.php">Documentos de Consulta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contacto.php">Contacto</a>
                    </li>
                </ul>
                <a class="navbar-brand ms-auto" href="./index.php">UAEM</a>
            </div>
        </div>
    </nav>
    
    <a href="/SIGEFO/informacion" class="regresar">Regresar</a>
    <br>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="form-container p-4 shadow-sm rounded">
            <form id="email-form" method="POST" action="">
                <p class="form-title">Desarrollo de actividades dentro del aula</p>
                <p class="form-sub-title">Ingrese su correo electrónico</p>
                <div class="mb-3">
                    <input type="correo" class="form-control" id="correo" name="correo" placeholder="Correo electrónico" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Continuar</button>
            </form>
        </div>
    </div>

    <div class="contenido mx-auto" style="max-width:800px; display: none;" id="registration-form">
        <h4 id="section-title">Datos Generales</h4>
        <div class="line"></div>
        <form class="form" id="formRegistro" action="/src/controller/email/checkEmail.php" method="POST">
            <!-- Agregar los campos del formulario aquí -->
            <button type="submit" class="btn btn-primary enviar">Registrarse</button>
        </form>
    </div>

    <footer class="bg-custom-footer py-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex flex-column align-items-center align-items-md-center mb-2 mb-md-0 follow-us">
                    <h5 class="text-center text-md-end mb-2">¡Síguenos en nuestras redes sociales!</h5>
                    <div class="d-flex justify-content-center justify-content-md-end follow-us">
                        <a href="mailto:eval_docente@uaem.mx" class="text-white me-2"><img src="../webapp/assets/img/correo.png" alt="Correo" class="img-fluid"></a>
                        <a href="https://www.facebook.com/uaemformaciondocente" class="text-white me-2"><img src="../webapp/assets/img/facebook.png" alt="Facebook" class="img-fluid"></a>
                        <a href="https://www.youtube.com/channel/UCvc3SSAArfY-DsWXXZ4mwhg" class="text-white"><img src="../webapp/assets/img/youtube.png" alt="YouTube" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center text-md-center">
                    <div class="mb-2">
                        <h5 class="mb-1">Universidad Autónoma del Estado de Morelos</h5>
                        <p class="mb-3">Departamento de Formación Docente</p>
                        <p class="mb-1"><img src="../../assets/img/mapas-y-banderas.png" alt="ubicacion" class="img-fluid" style="height: 17px;"> Av. Universidad 1001, Chamilpa, Cuernavaca, Morelos, México</p>
                        <p class="mb-1"><img src="../../assets/img/llamada-telefonica.png" alt="telefono" class="img-fluid" style="height: 17px;"> (777) 329 70 00 Ext. 3249, 3352 y 3935</p>
                        <p class="mb-1"><img src="../../assets/img/correo-electronico.png" alt="correo" class="img-fluid" style="height: 17px;"> eval_docente@uaem.mx</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../webapp/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../webapp/assets/js/registro.js"></script>
</body>
</html>
