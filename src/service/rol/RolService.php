<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";

class RolService
{
    private $postgres;

    public function __construct(){
        $this->postgres = new PostgreSQL();
    }
    public function getRoles() {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT * FROM rol");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e);
        }
    }
}