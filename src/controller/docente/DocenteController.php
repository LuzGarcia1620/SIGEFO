<?php
require_once __DIR__ . "/../../service/docente/DocenteService.php";
require_once __DIR__ . "/../../model/docente/BeanDocente.php";

class DocenteController
{
    private $docenteService;
    private $beanDocente;

    public function __construct()
    {
        $this->docenteService = new DocenteService();
        $this->beanDocente = new BeanDocente();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    break;

                case 'update':
                    break;

                case 'delete':
                    break;

                case 'change':
                    break;

                case 'validateEmail':
                    try {
                        $service = $this->docenteService;

                        $email = $_POST["correo"];

                        $result = $service->validateEmail($email);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                            return $result;
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                            return array();
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
            //$docentes = $this->docenteService->getAll();

            //return $docentes ? $docentes : array();
        }
    }
}