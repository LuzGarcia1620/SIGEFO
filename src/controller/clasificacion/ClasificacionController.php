<?php
require __DIR__ . "/../../service/user/ClasificacionService.php";
require __DIR__ . "/../../model/user/BeanClasificacion.php";

class ClasificacionController
{
    private $clasificacionService;
    private $beanClasificacion;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->beanClasificacion = new BeanClasificacion();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->clasificacionService;
                        $beanClasificacion = $this->beanClasificacion;

                        $beanClasificacion->constructSave(
                            $_POST['id'],
                            $_POST['nombre']
                        );

                        $result = $service->save($beanClasificacion);

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
                        $service = $this->clasificacionService;
                        $beanClasificacion = $this->beanClasificacion;

                        $beanClasificacion->constructUpdate(
                            $_POST['usuarioEditar'],
                            $_POST['nombreEditar']
                        );

                        $id = $_POST['id'];

                        $result = $service->update($beanClasificacion, $id);

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
                        $service = $this->clasificacionService;

                        $id = $_POST["id"];

                        $result = $service->delete($id);

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
                        $service = $this->clasificacionService;

                        $id = $_POST["id"];

                        $result = $service->changeStatus($id);

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
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $user = $this->clasificacionService->getById($id);

                return $user;
            } else {
                $users = $this->clasificacionService->getAll();

                return $users ? $users : array();
            }
        }
    }
}