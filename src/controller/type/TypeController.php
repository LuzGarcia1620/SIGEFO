<?php
require __DIR__ . "/../../service/type/TypeService.php";
require __DIR__ . "/../../model/type/BeanType.php";

class TypeController
{
    private $typeService;
    private $beanType;

    public function __construct()
    {
        $this->typeService = new TypeService();
        $this->beanType = new BeanType();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $type = $this->typeService->getById($id);

                return $type;
            } else {
                $types = $this->typeService->getAll();

                return $types ? $types : array();
            }
        }
    }
}