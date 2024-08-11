<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/registroActividad.css"/>
    <title>Registro</title>
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
<a href="/SIGEFO/registro" class="regresar">Regresar</a>

<!-- Inicio contenido principal -->
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$docente): ?>
<div class="form-section">
    <div class="container">
        <div class="heading">Registro</div>
        <form class="form" method="POST" action="/src/controller/docente/DocenteController.php">
            <div class="input-field">
                <input required autocomplete="off" type="text" name="nombre" id="nombre" value="" />
                <label for="nombre">Nombre(s)</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="paterno" id="apellidoPaterno" value="" />
                <label for="apellidoPaterno">Apellido Paterno</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="materno" id="apellidoMaterno" value="" />
                <label for="apellidoMaterno">Apellido Materno</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="sexo" id="sexo" value="" />
                <label for="sexo">Sexo</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="number" name="edad" id="edad" value="" />
                <label for="edad">Edad</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="email" name="correo" id="correo" value="" />
                <label for="correo">Correo Electrónico</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="grado" id="grado" value="" />
                <label for="grado">Grado</label>
            </div>
            <div class="input-field">
                <input required autocomplete="off" type="text" name="disciplina" id="disciplina" value="" />
                <label for="disciplina">Disciplina</label>
            </div>
            <div class="input-field">
                <select id="unidad" name="unidad" required>
                    <option value="" disabled selected>Unidad Académica</option>
                    <?php foreach ($unidades as $unidad): ?>
                        <option value="<?php echo $unidad['id'] ?>"><?php echo $unidad['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-field">
                <select id="perfil" name="perfil" required>
                    <option value="" disabled selected>Perfil</option>
                    <?php foreach ($profiles as $profile): ?>
                        <option value="<?php echo $profile['id'] ?>"><?php echo $profile['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <p>En los últimos 3 años, ¿Ha tomado alguna actividad formativa organizada por el Departamento de Formación Docente?</p>
            <div class="btn-container">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>

<!-- Fin de la NavBar -->

<div>
    <?php include __DIR__ . '/../../templates/footerPublico.html'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/SIGEFO/webapp/assets/js/bootstrap.bundle.min.js"></script>
<script src="/SIGEFO/webapp/assets/js/registro.js"></script>

</body>
</html>

