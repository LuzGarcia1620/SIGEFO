<?php
require __DIR__ . "/../../service/user/UserService.php";
require __DIR__ . "/../../model/user/BeanUser.php";

class TypeController
{
    private $typeService;
    private $beanType;

    public function __construct()
    {
        $this->typeService = new TypeService();
        $this->beanType = new BeanType();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->typeService;
                        $beanType = $this->beanType;

                        $beanType->constructSave(
                            $_POST['tipo']
                        );

                        $result = $service->save($beanType);

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
                        $service = $this->typeService;
                        $beanType = $this->beanType;

                        $beanType->constructUpdate(
                            $_POST['tipoEditar']
                        );

                        $idUsuario = $_POST['tipo'];

                        $result = $service->update($beanType, $tipo);

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
                        $service = $this->typeService;

                        $tipo = $_POST["id"];

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
                        $service = $this->typeService;

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
                $type = $this->typeService->getById($id);

                return $type;
            } else {
                $types = $this->typeService->getAll();

                return $types ? $types : array();
            }
        }
    }
}