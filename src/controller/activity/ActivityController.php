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
                        $beanActivity = new BeanActivity();

                        // Constructor para guardar datos
                        $beanActivity->constructSave(
                            $_POST['idInstructor'],
                            $_POST['idTipo'],
                            $_POST['nombre'],
                            $_POST['duracion'],
                            0, // Assuming horasPresencial, horasLinea, horasIndependiente are not in the form and default to 0
                            0,
                            0,
                            true, // Assuming status is true by default
                            0, // Assuming idClasificacion is not in the form and default to 0
                            $_POST['idModalidad'],
                            $_POST['dirigido'],
                            "", // Assuming perfilIngreso is not in the form and default to empty string
                            "", // Assuming perfilEgreso is not in the form and default to empty string
                            $_POST['objetivo'],
                            "", // Assuming temario is not in the form and default to empty string
                            0, // Assuming cupo is not in the form and default to 0
                            "" // Assuming presentacion is not in the form and default to empty string
                        );

                        $result = $this->activityService->save($beanActivity);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                            echo 'Activity saved successfully';
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                            echo 'Failed to save activity';
                        }

                        return $response;
                    } catch (Exception $e) {
                        error_log($e);
                        header('HTTP/1.0 500 Internal Server Error');
                        echo 'Internal server error';
                    }
                    break;

                case 'update':
                    // Handle update case
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
                    // Handle change case
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
