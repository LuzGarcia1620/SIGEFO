<?php
require __DIR__."/../../service/rol/RolService.php";

class RolController
{
    private $rolService;

    public function __construct() {
        $this->rolService = new RolService();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $roles = $this->rolService->getRoles();

            return $roles ? $roles : array();
        }
    }
}