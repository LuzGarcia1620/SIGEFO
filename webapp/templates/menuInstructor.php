<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/usuarios.css" />
    <title>menuSuperAdmin</title>

    <style>
    .container-fluid {
        display: flex;
        min-height: 100vh;
    }

    .navback {
        margin-top: 30px;
    }

    .menu {
        height: 50px;
        justify-content: center;
    }

    .menu a:hover {
        background-color: #3A5A96;
        color: #fff;
    }

    .btn-custom {
        font-size: 1.25rem;
        padding: 0.75rem 1.5rem;
    }

    .btn-custom:hover {
        background-color: #007bff;
        border-color: #007bff;
    }
    </style>
</head>

<body>
    <div class="navback">
        <ul class="list-unstyled vertical-nav">
            <li><a href="/SIGEFO/perfil" class="btn btn-block my-1 menu">Perfil</a></li>
            <li><a href="/SIGEFO/formulario" class="btn btn-primary btn-block my-1 menu">Formulario</a></li>
            <li><a href="/SIGEFO/cotejo" class="btn btn-primary btn-block my-1 menu">Asistencia</a></li>
            <li><a href="/SIGEFO/material" class="btn btn-primary btn-block my-1 menu">Material</a></li>
            <li><a href="/SIGEFO/login" class="btn btn-primary btn-block my-1 menu">Salir</a></li>
        </ul>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>