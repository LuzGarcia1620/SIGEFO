<?php
require __DIR__."/../../service/actividad/ActividadService.php";
require __DIR__."/../../model/actividad/BeanActividad.php";

class ActividadController
{
    private $actividadService;

    public function __construct(){
        $this->actividadService = new ActividadService();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];
            $response = '';

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->actividadService;

                        $beanActividad = new BeanActividad(
                            $_POST['idInstructor'],
                            $_POST['idTipo'],
                            $_POST['nombre'],
                            $_POST['duracion'],
                            $_POST['horasPresencial'],
                            $_POST['horasLinea'],
                            $_POST['horasIndependiente'],
                            $_POST['status'],
                            $_POST['idClasificacion'],
                            $_POST['idModalidad']
                        );

                        $result = $service->save($beanActividad);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }

                        return $response;
                    } catch (Exception $e) {
                        error_log($e);
                    }
                    break;
                    
                case 'update':
                    break;

                case 'delete':
                    try {
                        $idActividad = intval($_POST['idActividad']);
                        $result = $this->actividadService->delete($idActividad);

                        if ($result) {
                            echo 'success';
                        } else {
                            echo 'error';
                        }
                    } catch (Exception $e) {
                        error_log($e);
                        echo 'error';
                    }
                    break;
                    
                case 'change':
                    break;
                    
                default:
                    $responseMessage = 'invalid';
                    break;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $actividad = $this->actividadService->getById($id);

                return $actividad;
            } else {
                $actividades = $this->actividadService->getAll();

                return $actividades ? $actividades : array();
            }
        }
    }
}
?>
