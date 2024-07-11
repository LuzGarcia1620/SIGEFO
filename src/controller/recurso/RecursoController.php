<?php
require __DIR__ . "/../../service/recurso/RecursoService.php";
require __DIR__ . "/../../model/recurso/BeanRecurso.php";

class RecursoController
{
    private $recursoService;
    private $beanRecurso;

    public function __construct()
    {
        $this->recursoService = new RecursoService();
        $this->beanRecurso = new BeanRecurso();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $resource = $this->recursoService->getById($id);

                return $resource;
            } else {
                $resources = $this->recursoService->getAll();

                return $resources ? $resources : array();
            }
        }
    }
}