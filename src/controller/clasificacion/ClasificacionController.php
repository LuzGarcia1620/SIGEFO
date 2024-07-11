<?php
require __DIR__ . "/../../service/clasificacion/ClasificacionService.php";
require __DIR__ . "/../../model/clasificacion/BeanClasificacion.php";

class ClasificacionController
{
    private $clasificacionService;
    private $beanClasificacion;

    public function __construct()
    {
        $this->clasificacionService = new ClasificacionService();
        $this->beanClasificacion = new BeanClasificacion();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $clasifications = $this->clasificacionService->getById($id);

                return $clasifications;
            } else {
                $clasifications = $this->clasificacionService->getAll();

                return $clasifications ? $clasifications : array();
            }
        }
    }
}