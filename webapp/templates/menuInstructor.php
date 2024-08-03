<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/form.css"/>
    <link rel="stylesheet" href="/SIGEFO/webapp/assets/css/styles.css"/>
    <title>MenuInstructor</title>
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
        background-color: #dee0e5;
      }
    </style>
</head>
<body>
    <div class="navback">
        <ul class="list-unstyled vertical-nav">
            <li><a href="/SIGEFO/perfil" class="btn btn-block my-1 menu">Perfil</a></li>
            <li><a href="/SIGEFO/formulario" class="btn btn-primary btn-block my-1 menu">Formulario</a>
            </li>
            <li><a href="/SIGEFO/cotejo" class="btn btn-primary btn-block my-1 menu">Asistencia</a>
            </li>
            <li><a href="/SIGEFO/material" class="btn btn-primary btn-block my-1 menu">Material</a>
            </li>
            <li><a href="/SIGEFO/login" class="btn btn-primary btn-block my-1 menu"
                   onclick="<?php session_destroy(); ?>">Salir</a></li>
        </ul>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/../webapp/assets/js/form.js"></script>
</body>
</html>