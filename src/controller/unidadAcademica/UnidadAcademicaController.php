<?php
require __DIR__ . "/../../service/unidadAcademica/UnidadAcademicaService.php";
require __DIR__ . "/../../model/unidadAcademica/BeanUnidadAcademica.php";

class UnidadAcademicaController
{
    private $unidadAcademicaService;
    private $beanUnidadAcademica;

    public function __construct()
    {
        $this->unidadAcademicaService = new UnidadAcademicaService();
        $this->beanUnidadAcademica = new BeanUnidadAcademica();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->unidadAcademicaService;
                        $beanUnidadAcademica = $this->beanUnidadAcademica;

                        $beanUser->constructSave(
                            $_POST['nombre']
                        );

                        $result = $service->save($beanUnidadAcademica);

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
                        $service = $this->unidadAcademicaService;
                        $beanUnidadAcademica = $this->beanUnidadAcademica;

                        $beanUnidadAcademica->constructUpdate(
                            $_POST['nombreEditar']
                        );

                        $idUsuario = $_POST['id'];

                        $result = $service->update($beanUnidadAcademica, $id);

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
                        $service = $this->unidadAcademicaService;

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
                        $service = $this->unidadAcademicaService;

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
                $unidadAcademica = $this->unidadAcademicaService->getById($id);

                return $unidadAcademica;
            } else {
                $unidadAcademicas = $this->unidadAcademicaService->getAll();

                return $unidadAcademicas ? $unidadAcademicas : array();
            }
        }
    }
}