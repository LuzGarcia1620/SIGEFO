<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";
require_once __DIR__ . "/../../model/activity/BeanActivity.php";

class FormActivityService
{
    private $postgres;

    public function __construct()
    {
        $this->postgres = new PostgreSQL();
    }

    public function saveForm(BeanActivity $beanActivity, $idRecurso)
    {
        $conn = $this->postgres->connect();

        try {
            $conn->beginTransaction();

            $stmt = $conn->prepare("SELECT form (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bindValue(1, $beanActivity->getIdTipo());
            $stmt->bindValue(2, $beanActivity->getNombre());
            $stmt->bindValue(3, $beanActivity->getDuracion());
            $stmt->bindValue(4, $beanActivity->getHorasPresencial());
            $stmt->bindValue(5, $beanActivity->getHorasLinea());
            $stmt->bindValue(6, $beanActivity->getHorasIndependiente());
            $stmt->bindValue(7, $beanActivity->getStatus());
            $stmt->bindValue(8, $beanActivity->getIdClasificacion());
            $stmt->bindValue(9, $beanActivity->getIdModalidad());
            $stmt->bindValue(10, $beanActivity->getDirigidoA());
            $stmt->bindValue(11, $beanActivity->getPerfilIngreso());
            $stmt->bindValue(12, $beanActivity->getPerfilEgreso());
            $stmt->bindValue(13, $beanActivity->getObjetivo());
            $stmt->bindValue(14, $beanActivity->getTemario());
            $stmt->bindValue(15, $beanActivity->getCupo());
            $stmt->bindValue(16, $beanActivity->getPresentacion());
            $stmt->bindParam(17, $idRecurso);

            $result = $stmt->execute();
            $conn->commit();

            return $result;
        } catch (Exception $e) {
            $conn->rollback();
            error_log("Save Form Error: " . $e->getMessage());
            return false;
        }
    }
}
?>
