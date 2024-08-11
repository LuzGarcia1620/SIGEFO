<?php
require_once __DIR__ . "/../../service/unidadAcademica/UnidadAcademicaService.php";
require_once __DIR__ . "/../../model/unidadAcademica/BeanUnidadAcademica.php";

class UnidadAcademicaController
{
    private $unidadAcademicaService;
    private $beanUnidadAcademica;

    public function __construct()
    {
        $this->unidadAcademicaService = new UnidadAcademicaService();
        $this->beanUnidadAcademica = new BeanUnidadAcademica();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $unidadAcademica = $this->unidadAcademicaService->getById($id);

                return $unidadAcademica;
            } else {
                $unidadAcademicas = $this->unidadAcademicaService->getAll();

                return $unidadAcademicas ? $unidadAcademicas : array();
            }
        }
    }
}