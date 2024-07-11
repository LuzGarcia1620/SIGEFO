<?php
require __DIR__ . "/../../service/modality/ModalityService.php";
require __DIR__ . "/../../model/modality/BeanModality.php";

class ModalityController
{
    private $modalityService;
    private $beanModality;

    public function __construct()
    {
        $this->modalityService = new ModalityService();
        $this->beanModality = new BeanModality();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    try {
                        $service = $this->modalityService;
                        $beanModality = $this->beanModality;

                        $beanModality->constructSave(
                            $_POST['id'],
                            $_POST['nombre']
                        );

                        $result = $service->save($beanModality);

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
                        $service = $this->modalityService;
                        $beanModality = $this->beanModality;

                        $beanModality->constructUpdate(
                            $_POST['nombreEditar']
                        );

                        $id = $_POST['id'];

                        $result = $service->update($beanModality, $id);

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
                        $service = $this->modalityService;

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
                        $service = $this->modalityService;

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
                $user = $this->modalityService->getById($id);

                return $modality;
            } else {
                $modality = $this->modalityService->getAll();

                return $modality ? $modality : array();
            }
        }
    }
}