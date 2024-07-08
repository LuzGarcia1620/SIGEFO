<?php
require __DIR__ . "/../../service/user/UserService.php";
require __DIR__ . "/../../model/user/BeanUser.php";

class UserController
{
    private $userService;
    private $beanUser;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->beanUser = new BeanUser();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->userService;
                        $beanUser = $this->beanUser;

                        $beanUser->constructSave(
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

                    } catch (Exception $e) {
                        error_log($e);
                    }
                    break;

                case 'update':
                    try {
                        $service = $this->userService;
                        $beanUser = $this->beanUser;

                        $beanUser->constructUpdate(
                            $_POST['usuarioEditar'],
                            $_POST['nombreEditar'],
                            $_POST['apellidoPaternoEditar'],
                            $_POST['apellidoMaternoEditar'],
                            $_POST['correoEditar']
                        );

                        $idUsuario = $_POST['idUsuario'];

                        $result = $service->update($beanUser, $idUsuario);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }

                    } catch (Exception $e) {
                        error_log($e);
                    }
                    break;

                case 'delete':
                    try {
                        $service = $this->userService;

                        $idUsuario = $_POST["idUsuario"];

                        $result = $service->delete($idUsuario);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
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