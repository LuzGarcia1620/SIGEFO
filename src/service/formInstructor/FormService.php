<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";

class FormService
{
    private $postgres;

    public function __construct()
    {
        $this->postgres = new PostgreSQL();
    }

    public function saveCustomModality ($modality)
    {
        $conn = $this->postgres->connect();
        $stmt = $conn->prepare("INSERT INTO modalidad (nombre) VALUES (?) RETURNING id;");
        $stmt->bindParam(1, $modality);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function saveForm(BeanArea $beanArea, BeanInstructor $beanInstructor, BeanActivity $beanActivity, $idRecurso)
    {
        $conn = $this->postgres->connect();

        try {

            $conn->beginTransaction();

            $stmt = $conn->prepare("SELECT form (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bindValue(1, $beanArea->getNombre());
            $stmt->bindValue(2,$beanInstructor->getIdUsuario());
            $stmt->bindValue(3,$beanInstructor->getGrado());
            $stmt->bindValue(4,$beanInstructor->getInstitucion());
            $stmt->bindValue(5,$beanInstructor->getTelefono());
            $stmt->bindValue(6,$beanInstructor->getIdPerfil());
            $stmt->bindValue(7,$beanInstructor->getSemblanza());
            $stmt->bindValue(8,$beanInstructor->getTiempoDocencia());
            $stmt->bindValue(9, $beanActivity->getIdTipo());
            $stmt->bindValue(10, $beanActivity->getNombre());
            $stmt->bindValue(11, $beanActivity->getDuracion());
            $stmt->bindValue(12, $beanActivity->getHorasPresencial());
            $stmt->bindValue(13, $beanActivity->getHorasLinea());
            $stmt->bindValue(14, $beanActivity->getHorasIndependiente());
            $stmt->bindValue(15, $beanActivity->getIdClasificacion());
            $stmt->bindValue(16, $beanActivity->getIdModalidad());
            $stmt->bindValue(17, $beanActivity->getDirigidoA());
            $stmt->bindValue(18, $beanActivity->getPerfilIngreso());
            $stmt->bindValue(19, $beanActivity->getPerfilEgreso());
            $stmt->bindValue(20, $beanActivity->getObjetivo());
            $stmt->bindValue(21, $beanActivity->getTemario());
            $stmt->bindValue(22, $beanActivity->getCupo());
            $stmt->bindValue(23, $beanActivity->getPresentacion());
            $stmt->bindParam(24, $idRecurso);

            $stmt->execute();
            $result = $stmt->fetchColumn();

            $conn->commit();

            return $result;
        } catch (Exception $e) {
            $conn->rollback();
            error_log("Save Form Error: " . $e->getMessage());
        }
    }

    public function saveFormWithoutIns($idInstructor, BeanActivity $beanActivity, $idRecurso)
    {
        $conn = $this->postgres->connect();

        try {

            $conn->beginTransaction();

            $stmt = $conn->prepare("SELECT formWithoutIns (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bindParam(1, $idInstructor);
            $stmt->bindValue(2, $beanActivity->getIdTipo());
            $stmt->bindValue(3, $beanActivity->getNombre());
            $stmt->bindValue(4, $beanActivity->getDuracion());
            $stmt->bindValue(5, $beanActivity->getHorasPresencial());
            $stmt->bindValue(6, $beanActivity->getHorasLinea());
            $stmt->bindValue(7, $beanActivity->getHorasIndependiente());
            $stmt->bindValue(8, $beanActivity->getIdClasificacion());
            $stmt->bindValue(9, $beanActivity->getIdModalidad());
            $stmt->bindValue(10, $beanActivity->getDirigidoA());
            $stmt->bindValue(11, $beanActivity->getPerfilIngreso());
            $stmt->bindValue(12, $beanActivity->getPerfilEgreso());
            $stmt->bindValue(13, $beanActivity->getObjetivo());
            $stmt->bindValue(14, $beanActivity->getTemario());
            $stmt->bindValue(15, $beanActivity->getCupo());
            $stmt->bindValue(16, $beanActivity->getPresentacion());
            $stmt->bindValue(17, $idRecurso);

            $result = $stmt->execute();

            $conn->commit();

            return $result;
        } catch (Exception $e) {
            $conn->rollback();
            error_log("Save FormWiIns Error: " . $e->getMessage());
        }
    }
}