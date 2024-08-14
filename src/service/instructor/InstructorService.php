<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";

class InstructorService
{
    private $postgres;

    public function __construct()
    {
        $this->postgres = new PostgreSQL();
    }

    public function validateHaveInstructor ($id)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT * FROM instructor WHERE idUsuario = ?;");
            $stmt->bindParam(1, $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            error_log("validateHaveInstructor : " . $e->getMessage());
        }
    }

    public function getOne ($idInstructor)
    {
        try {
            $conn = $this->postgres->connect();
            $stmt = $conn->prepare("SELECT * FROM instructor WHERE idInstructor = ?;");
            $stmt->bindParam(1, $idInstructor);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            error_log("getOne : " . $e->getMessage());
        }
    }

    public function queryGetActivityForInstructor ($idinstructor)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT a.nombre, a.fechaImp, a.duracion, ins.idinstructor
                FROM actividad AS a
                LEFT JOIN instructor AS ins ON a.idInstructor = ins.idInstructor
                WHERE ins.idInstructor = ?;");
            $stmt->bindParam(1, $idinstructor);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get All Instructors Error: " . $e->getMessage());
        }
    }
}