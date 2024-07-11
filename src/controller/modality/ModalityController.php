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

        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $modalities = $this->modalityService->getById($id);

                return $modalities;
            } else {
                $modalities = $this->modalityService->getAll();

                return $modalities ? $modalities : array();
            }
        }
    }
}