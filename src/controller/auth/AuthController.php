<?php
require __DIR__ . "/../../service/auth/AuthService.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if (isset($_POST["action"]) && $_POST["action"] === 'login') {
        if (isset($_POST['usuario']) && isset($_POST['password'])) {
            $controller = new AuthService();
            $controller->login($_POST['usuario'], $_POST['password']);

        } else {
            echo "Usuario o contraseña no proporcionados.";
        }
    } else {
        echo "Acción no válida.";
    }
}
?>
