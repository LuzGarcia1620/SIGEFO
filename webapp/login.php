<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
</head>
<body>
<h2>Iniciar Sesión</h2>
<form action="../src/controller/auth/AuthController.php" method="post">
    <label for="usuario">Usuario:</label><br>
    <input type="text" id="usuario" name="usuario" required><br><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <input type="hidden" name="action" value="login">

    <input type="submit" value="Enviar">
</form>
</body>
</html>
