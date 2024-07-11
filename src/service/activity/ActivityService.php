<?php
require __DIR__."/../../../src/config/PostgreSQL.php";

class ActivityService
{
    private $postgres;

    public function __construct() {
        $this->postgres = new PostgreSQL();
    }

    public function getAll() {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT a.idactividad, a.nombre, a.duracion, a.horas_presencial, a.horas_linea, a.horas_independiente, a.status, 
                                        i.nombre AS instructor, t.nombre AS tipo, c.nombre AS clasificacion, m.nombre AS modalidad 
                                    FROM actividad AS a 
                                    JOIN instructor AS i ON a.idinstructor = i.idinstructor 
                                    JOIN tipo AS t ON a.idtipo = t.id 
                                    JOIN clasificacion AS c ON a.idclasificacion = c.id 
                                    JOIN modalidad AS m ON a.idmodalidad = m.id;");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e);
        }
    }

    public function getById($idActividad) {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT a.idactividad, a.nombre, a.duracion, a.horas_presencial, a.horas_linea, a.horas_independiente, a.status, 
                                        i.nombre AS instructor, t.nombre AS tipo, c.nombre AS clasificacion, m.nombre AS modalidad 
                                    FROM actividad AS a 
                                    JOIN instructor AS i ON a.idinstructor = i.idinstructor 
                                    JOIN tipo AS t ON a.idtipo = t.id 
                                    JOIN clasificacion AS c ON a.idclasificacion = c.id 
                                    JOIN modalidad AS m ON a.idmodalidad = m.id 
                                    WHERE a.idactividad = ?;");
            $stmt->bindValue(1, $idActividad);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            error_log("Error getting actividad by ID: " . $e->getMessage());
        }
    }

    public function save(BeanActividad $beanActividad) {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("INSERT INTO actividad (idinstructor, idtipo, nombre, duracion, horas_presencial, horas_linea, horas_independiente, status, idclasificacion, idmodalidad) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bindValue(1, $beanActividad->getIdInstructor());
            $stmt->bindValue(2, $beanActividad->getIdTipo());
            $stmt->bindValue(3, $beanActividad->getNombre());
            $stmt->bindValue(4, $beanActividad->getDuracion());
            $stmt->bindValue(5, $beanActividad->getHorasPresencial());
            $stmt->bindValue(6, $beanActividad->getHorasLinea());
            $stmt->bindValue(7, $beanActividad->getHorasIndependiente());
            $stmt->bindValue(8, $beanActividad->getStatus());
            $stmt->bindValue(9, $beanActividad->getIdClasificacion());
            $stmt->bindValue(10, $beanActividad->getIdModalidad());

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Save actividad failed: " . $e->getMessage());
        }
    }

    public function delete($idActividad) {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("DELETE FROM actividad WHERE idactividad = ?");
            $stmt->bindValue(1, $idActividad);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            error_log("Delete actividad failed: " . $e->getMessage());
            return false;
        }
    }

    public function getInstructors() {
        try {
            $conn = $this->postgres->connect();
            $stmt = $conn->prepare("SELECT idInstructor, CONCAT(nombre, ' ', paterno, ' ', materno) AS nombre FROM instructor INNER JOIN usuario ON instructor.idUsuario = usuario.idUsuario;");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Error getting instructors: " . $e->getMessage());
        }
    }

    public function getModalities() {
        try {
            $conn = $this->postgres->connect();
            $stmt = $conn->prepare("SELECT id, nombre FROM modalidad;");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Error getting modalities: " . $e->getMessage());
        }
    }

    public function getTypes() {
        try {
            $conn = $this->postgres->connect();
            $stmt = $conn->prepare("SELECT id, tipo FROM tipo;");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Error getting types: " . $e->getMessage());
        }
    }
}
?>
