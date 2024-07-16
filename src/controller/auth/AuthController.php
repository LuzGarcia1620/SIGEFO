<?php
require __DIR__ . "/../../service/auth/AuthService.php";

class AuthController
{
    private $authService;

    public function __construct(){
        $this->authService = new AuthService();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'login':
                    try {
                        $service = $this->authService;

                        $user = $_POST['usuario'];
                        $password = $_POST['password'];

                        $result = $service->login($user, $password);
                        if ($result) {
                            header('HTTP/1.0 200 OK');
                            session_start();
                            $_SESSION['idUsuario'] = $result["idusuario"];
                            $_SESSION['rol'] = $result["rol"];
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }
                    } catch (Exception $e) {
                        error_log($e->getMessage());
                    }
                    break;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

        }
    }
}