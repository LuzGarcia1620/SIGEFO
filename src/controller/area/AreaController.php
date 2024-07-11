<?php
require __DIR__ . "/../../service/area/AreaService.php";
require __DIR__ . "/../../model/area/BeanArea.php";

class AreaController
{
    private $areaService;
    private $beanArea;

    public function __construct()
    {
        $this->areaService = new AreaService();
        $this->beanArea = new BeanArea();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->areaService;
                        $beanArea = $this->beanArea;

                        $beanArea->constructSave(
                            $_POST['id'],
                            $_POST['nombre']
                        );

                        $result = $service->save($beanArea);

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
                        $service = $this->areaService;
                        $beanArea = $this->beanArea;

                        $beanArea->constructUpdate(
                            $_POST['usuarioEditar'],
                            $_POST['nombreEditar'],
                            $_POST['apellidoPaternoEditar'],
                            $_POST['apellidoMaternoEditar'],
                            $_POST['correoEditar']
                        );

                        $id = $_POST['id'];

                        $result = $service->update($beanArea, $id);

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
                        $service = $this->areaService;

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
                        $service = $this->areaService;

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
                $user = $this->areaService->getById($id);

                return $user;
            } else {
                $users = $this->areaService->getAll();

                return $users ? $users : array();
            }
        }
    }
}