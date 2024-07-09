<?php
require __DIR__."/../../service/activity/ActivityService.php";
require __DIR__."/../../model/activity/BeanActivity.php";

class ActivityController
{
    private $activityService;

    public function __construct(){
        $this->activityService = new ActivityService();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];
            $response = '';

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->activityService;

                        $beanActivity = new BeanActivity(
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

                        $result = $service->save($beanActivity);

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
                        $result = $this->activityService->delete($idActividad);

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
                $activity = $this->activityService->getById($id);

                return $activity;
            } else {
                $actividades = $this->activityService->getAll();
                $instructores = $this->activityService->getInstructors();
                $modalidades = $this->activityService->getModalities();
                $tipos = $this->activityService->getTypes();
                return [
                    'actividades' => $actividades,
                    'instructores' => $instructores,
                    'modalidades' => $modalidades,
                    'tipos' => $tipos
                ];
            }
        }
    }
}
?>
