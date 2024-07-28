<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";

class UnidadAcademicaService
{
    private $postgres;

    public function __construct()
    {
        $this->postgres = new PostgreSQL;
    }

    public function getAll()
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT * FROM unidad_academica");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get All Academic Units Error: " . $e->getMessage());
        }
    }
}