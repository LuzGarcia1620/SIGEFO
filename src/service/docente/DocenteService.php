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

    public function saveDocente(BeanDocente $beanDocente, $idActividad)
    {
        $conn = $this->postgres->connect();

        try{
            $conn->beginTransaction();

            $stmt = $conn->prepare("SELECT saveDocenteWithInscription (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bindValue(1, $beanDocente->getNombre());
            $stmt->bindValue(2, $beanDocente->getPaterno());
            $stmt->bindValue(3, $beanDocente->getMaterno());
            $stmt->bindValue(4, $beanDocente->getSexo());
            $stmt->bindValue(5, $beanDocente->getEdad());
            $stmt->bindValue(6, $beanDocente->getCorreo());
            $stmt->bindValue(7, $beanDocente->getGrado());
            $stmt->bindValue(8, $beanDocente->getDisciplina());
            $stmt->bindValue(9, $beanDocente->getTresanios());
            $stmt->bindValue(10, $beanDocente->getIdUnidadAcademica());
            $stmt->bindValue(11, $beanDocente->getIdPerfil());
            $stmt->bindParam(12, $idActividad);

            $result = $stmt->execute();

            $conn->commit();

            return $result;
        }catch (Exception $e) {
            error_log("Error in Save Docente" . $e->getMessage());
        }
    }

    public function getAll(){
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT * FROM docente;");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e);
        }
    }

    public function queryActivitiesForDocente($iddocente)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT
                    CONCAT(us.nombre, ' ', us.paterno, ' ', us.materno) AS instructor,
                    a.nombre AS actividad_nombre,
                    a.fechaImp AS fecha_actividad
                FROM
                    DOCENTE d
                JOIN
                    INSCRIPCION ins ON d.idDocente = ins.idDocente
                JOIN
                    ACTIVIDAD a ON ins.idActividad = a.idActividad
                JOIN
                    INSTRUCTOR i ON a.idInstructor = i.idInstructor
                JOIN USUARIO us ON i.idUsuario = us.idUsuario
                WHERE
                    d.idDocente = ?;");
            $stmt->bindValue(1, $iddocente);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e);
        }
    }
}