<?php
require_once __DIR__ . "/../../service/docente/DocenteService.php";
require_once __DIR__ . "/../../model/docente/BeanDocente.php";
require_once __DIR__ . "/../../model/inscripcion/BeanInscripcion.php";

class DocenteController
{
    private $docenteService;
    private $beanDocente;
    private $beanInscripcion;

    public function __construct()
    {
        $this->docenteService = new DocenteService();
        $this->beanDocente = new BeanDocente();
        $this->beanInscripcion = new BeanInscripcion();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $beanDocente = new BeanDocente();

                        // Constructor para guardar datos
                        $beanDocente->saveDocente(
                            $_POST['nombre'],
                            $_POST['paterno'],
                            $_POST['materno'],
                            $_POST['sexo'],
                            $_POST['edad'],
                            $_POST['correo'],
                            $_POST['grado'],
                            $_POST['disciplina'],
                            $_POST['tresanios'],
                            $_POST['unidad'],
                            $_POST['perfil']
                        );

                        $idActividad = $_POST['idactividad'];

                        $result = $this->docenteService->saveDocente($beanDocente, $idActividad);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                            echo 'Docente Inscrito correctamente';
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                            echo 'Docente No Inscrito correctamente';
                        }
                    } catch (Exception $e) {
                        error_log($e);
                        header('HTTP/1.0 500 Internal Server Error');
                        echo 'Internal server error';
                    }
                    break;

                case 'evaluacion':
                    try {
                        $beanIns = new BeanInscripcion();

                        // Constructor para guardar datos
                        $beanIns->constructEditIns(
                            $_POST['usermoodle'],
                            $_POST['passmoodle'],
                            $_POST['evaluacion'],
                            $_POST['coment']
                        );

                        $idDocente = $_POST['iddocente'];

                        $result = $this->docenteService->editIns($beanIns, $idDocente);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }
                    } catch (Exception $e) {
                        error_log($e);
                        header('HTTP/1.0 500 Internal Server Error');
                        echo 'Internal server error';
                    }
                    break;

                default:
                    error_log("Unsupported request method");
                    break;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['correo'])) {
                try {
                    $service = $this->docenteService;

                    $email = $_GET["correo"];

                    $result = $service->validateEmail($email);

                    if ($result) {
                        header('HTTP/1.0 200 OK');
                        return $result;
                    } else {
                        header('HTTP/1.0 400 Bad Request');
                    }
                } catch (Exception $e) {
                    error_log($e);
                }
            } else if (isset($_GET['docente'])) {
                $id = intval($_GET['docente']);
                $activity = $this->docenteService->queryActivitiesForDocente($id);

                return $activity;
            }else {
                $docentes = $this->docenteService->getAll();

                return $docentes ? $docentes : array();
            }
        }
    }
}