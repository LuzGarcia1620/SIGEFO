<?php
require_once __DIR__ . "/../../service/formActivity/FormActivityService.php";
require_once __DIR__ . "/../../model/activity/BeanActivity.php";

class FormActivityController
{
    private $formActivityService;
    private $beanActivity;

    public function __construct()
    {
        $this->formActivityService = new FormActivityService();
        $this->beanActivity = new BeanActivity();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->formActivityService;
                        $beanActivity = $this->beanActivity;

                        $beanActivity->constructSave(
                            $_POST['idTipo'],
                            $_POST['nombre'],
                            $_POST['duracion'],
                            $_POST['horasPresencial'],
                            $_POST['horasLinea'],
                            $_POST['horasIndependiente'],
                            $_POST['status'],
                            $_POST['idClasificacion'],
                            $_POST['idModalidad'],
                            $_POST['dirigidoA'],
                            $_POST['perfilIngreso'],
                            $_POST['perfilEgreso'],
                            $_POST['objetivo'],
                            $_POST['temario'],
                            $_POST['cupo'],
                            $_POST['presentacion']
                        );

                        $idRecurso = $_POST['recurso'];

                        $result = $service->saveForm($beanActivity, $idRecurso);

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
?>
