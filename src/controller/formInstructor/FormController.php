<?php
require_once __DIR__ . "/../../service/formInstructor/FormService.php";
require_once __DIR__ . "/../../model/area/BeanArea.php";
require_once __DIR__ . "/../../model/instructor/BeanInstructor.php";
require_once __DIR__ . "/../../model/activity/BeanActivity.php";
class FormController
{
    private $formService;
    private $beanArea;
    private $beanInstructor;
    private $beanActivity;

    public function __construct()
    {
        $this->formService = new FormService();
        $this->beanArea = new BeanArea();
        $this->beanInstructor = new BeanInstructor();
        $this->beanActivity = new BeanActivity();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->formService;
                        $beanArea = $this->beanArea;
                        $beanInstructor = $this->beanInstructor;
                        $beanActivity = $this->beanActivity;

                        $beanArea->constructSave(
                            $_POST['areas']
                        );

                        $beanInstructor->constructSave(
                            $_POST['idUsuario'],
                            $_POST['gradoAcademico'],
                            $_POST['institucion'],
                            $_POST['telefono'],
                            $_POST['perfil'],
                            $_POST['semblanza'],
                            $_POST['docencia']
                        );

                        $beanActivity->constructSave(
                            $_POST['tipo'],
                            $_POST['nombreActividad'],
                            $_POST['duracion'],
                            $_POST['presencial'],
                            $_POST['enLinea'],
                            $_POST['independiente'],
                            $_POST['status'],
                            $_POST['clasificacion'],
                            $_POST['modalidad'],
                            $_POST['dirigido'],
                            $_POST['ingreso'],
                            $_POST['egreso'],
                            $_POST['objetivo'],
                            $_POST['temario'],
                            $_POST['cupo'],
                            $_POST['presentacion']
                        );

                        $idRecurso = $_POST['recurso'];

                        $result = $service->saveForm($beanArea, $beanInstructor, $beanActivity, $idRecurso);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }

                    } catch (Exception $e) {
                        error_log($e);
                    }
                    break;
            }
        }
    }
}