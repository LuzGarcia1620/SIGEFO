<?php
require_once __DIR__ . "/../../service/user/UserService.php";
require_once __DIR__ . "/../../model/user/BeanUser.php";

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
                            sha1($_POST['password']),
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
                            $_POST['correoEditar'],
                            $_POST['passwordEditar']
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
                    }
                    break;

                case 'change':
                    try {
                        $service = $this->userService;

                        $idUsuario = $_POST["idUsuario"];

                        $result = $service->changeStatus($idUsuario);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }
                    } catch (Exception $e) {
                        error_log($e);
                    }
                    break;

                default:
                    error_log("Unsupported request method");
                    break;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $users = $this->userService->getAll();
            $instructores = $this->userService->getAllInstructors();

            $result = array();
            $result['usuarios'] = $users ? $users : array();
            $result['instructores'] = $instructores ? $instructores : array();

            return $result;
        }
    }


}