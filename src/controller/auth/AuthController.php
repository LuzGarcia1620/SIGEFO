<?php
require __DIR__ . "/../../service/auth/AuthService.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];

    switch ($action) {
        case 'login':
            $controller = new AuthService();
            $controller->login($_POST['usuario'], $_POST['password']);
            break;
        default:
            echo "Ijole no se que hiciste";
            break;
    }
}
