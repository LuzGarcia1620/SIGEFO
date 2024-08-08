<?php
require __DIR__."/../../service/activity/ActivityService.php";
require_once __DIR__."/../../model/activity/BeanActivity.php";

class ActivityController
{
    private $activityService;

    public function __construct(){
        $this->activityService = new ActivityService();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $beanActivity = new BeanActivity();

                        // Constructor para guardar datos
                        $beanActivity->constructSaveWithIns(
                            $_POST['idInstructor'],
                            $_POST['idTipo'],
                            $_POST['nombre'],
                            $_POST['duracion'],
                            $_POST['presencial'],
                            $_POST['enLinea'],
                            $_POST['independiente'],
                            $_POST['clasificacion'],
                            $_POST['modalidad'],
                            $_POST['dirigido'],
                            $_POST['ingreso'],
                            $_POST['egreso'],
                            $_POST['objetivo'],
                            $_POST['temario'],
                            $_POST['cupo'],
                            $_POST['presentacion'],
                            $_POST['fecha'],
                            $_POST['horario']
                        );

                        $result = $this->activityService->save($beanActivity);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                            echo 'Activity saved successfully';
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                            echo 'Failed to save activity';
                        }
                    } catch (Exception $e) {
                        error_log($e);
                        header('HTTP/1.0 500 Internal Server Error');
                        echo 'Internal server error';
                    }
                    break;

                case 'update':
                    try {
                        $beanActivity = new BeanActivity();

                        $beanActivity->constructUpdate(
                            $_POST['modalidad'],
                            $_POST['nombre'],
                            $_POST['dirigido'],
                            $_POST['objetivo'],
                            $_POST['Instructor'],
                            $_POST['idTipo'],
                            $_POST['fecha'],
                            $_POST['duracion'],
                            $_POST['horario']
                        );

                        $idActividad = $_POST['idActividad'];

                        $result = $this->activityService->update($beanActivity, $idActividad);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }
                    } catch (Exception $e) {
                        error_log($e);
                        header('HTTP/1.0 500 Internal Server Error');
                    }
                    break;

                case 'sendToPublic':
                    try {
                        $service = $this->activityService;

                        $idActividad= $_POST["idActividad"];

                        $result = $service->sendToPublic($idActividad);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }
                    } catch (Exception $e) {
                        error_log($e);
                        header('HTTP/1.0 500 Internal Server Error');
                    }
                    break;

                case 'delete':
                    try {
                        $service = $this->activityService;

                        $idActividad= $_POST["idActividad"];

                        $result = $service->delete($idActividad);

                        if ($result) {
                            header('HTTP/1.0 200 OK');
                        } else {
                            header('HTTP/1.0 400 Bad Request');
                        }
                    } catch (Exception $e) {
                        error_log($e);
                        header('HTTP/1.0 500 Internal Server Error');
                    }
                    break;

                default:
                    error_log("Method invalid");
                    break;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['actividad'])) {
                $id = intval($_GET['actividad']);
                $activity = $this->activityService->getById($id);

                return $activity;
            } else {
                $actividades = $this->activityService->getAll();

                return $actividades ? $actividades : array();

            }
        }
    }
}
