<?php
require __DIR__ . "/../../service/recurso/RecursoService.php";
require __DIR__ . "/../../model/recurso/BeanRecurso.php";

class RecursoController
{
    private $RecursoService;
    private $beanRecurso;

    public function __construct()
    {
        $this->recursoService = new RecursoService();
        $this->beanRecurso = new BeanRecurso();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->RecursoSerrice;
                        $beanRecurso = $this->beanRecurso;

                        $beanRecurso->constructSave(
                            $_POST['id'],
                            $_POST['nombre']
                        );

                        $result = $service->save($beanRecurso);

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
                        $service = $this->recursoService;
                        $beanRecurso = $this->beanRecurso;

                        $beanRecurso->constructUpdate(
                            $_POST['nombreEditar']
                        );

                        $id = $_POST['id'];

                        $result = $service->update($beanRecurso, $id);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }

                    } catch (Exception $e) {
                        error_log($e);
                    }
                    break;

               /* case 'delete':
                    try {
                        $service = $this->recursoService;

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
                    break;*/

                case 'change':
                    try {
                        $service = $this->recursoService;

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
                $user = $this->recursoService->getById($id);

                return $modality;
            } else {
                $recurso = $this->recursoService->getAll();

                return $recurso ? $recurso : array();
            }
        }
    }
}