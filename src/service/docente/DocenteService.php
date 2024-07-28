<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";

class DocenteService
{
    private $postgres;

    public function __construct()
    {
        $this->postgres = new PostgreSQL();
    }

    public function validateEmail($email)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT d.idDocente, d.nombre, d.paterno, d.materno, d.sexo, d.edad, d.correo, d.grado, d.disciplina, ua.nombre AS unidad, p.nombre AS perfil FROM docente AS d JOIN unidad_academica AS ua ON d.idUnidadAcademica = ua.id JOIN perfil AS p ON d.idPerfil = p.id WHERE d.correo = ?;");
            $stmt->bindParam(1, $email);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            error_log("Error in Validate Email" . $e->getMessage());
        }
    }
}