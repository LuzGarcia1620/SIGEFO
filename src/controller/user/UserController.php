<?php
require __DIR__."/../../service/user/UserService.php";
require __DIR__."/../../model/user/BeanUser.php";

class UserController
{
    private $userService;

    public function __construct(){
        $this->userService = new UserService();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];
            $response = '';

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->userService;

                        $beanUser = new BeanUser(
                            $_POST['usuario'],
                            $_POST['password'],
                            $_POST['nombre'],
                            $_POST['apellidoPaterno'],
                            $_POST['apellidoMaterno'],
                            $_POST['correo'],
                            $_POST['rol']
                        );

                        $result = $service->save($beanUser);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }

                        return $response;
                    } catch (Exception $e) {
                        error_log($e);
                    }
                    break;
                    
                case 'update':
                    break;

                    case 'delete':
                        try {
                            $idUsuario = intval($_POST['idUsuario']);
                            $result = $this->userService->delete($idUsuario);
    
                            if ($result) {
                                echo 'success';
                            } else {
                                echo 'error';
                            }
                        } catch (Exception $e) {
                            error_log($e);
                            echo 'error';
                        }
                        break;
                    
                case 'change':
                    break;
                default:
                    $responseMessage = 'invalid';
                    break;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $user = $this->userService->getById($id);

                return $user;
            } else {
                $users = $this->userService->getAll();

                return $users ? $users : array();
            }
        }
    }
}