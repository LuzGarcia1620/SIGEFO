<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";
require_once __DIR__ . "/../../../src/model/activity/BeanActivity.php";

class ActivityService
{
    private $postgres;
    public function __construct()
    {
        $this->postgres = new PostgreSQL();
    }
    public function getAll()
    {
        try {
            $conn = $this->postgres->connect();
            $stmt = $conn->prepare("SELECT ac.idActividad, ac.nombre AS nombreActividad, 
                                    ti.tipo, ac.status, ac.dirigidoA, ac.objetivo, 
                                    us.nombre, us.paterno, us.materno, m.nombre AS modalidad, 
                                    ac.duracion, ac.fechaImp, ac.horaImp FROM actividad AS ac
                                    LEFT JOIN instructor AS i ON ac.idInstructor = i.idInstructor
                                    LEFT JOIN usuario AS us ON i.idUsuario = us.idUsuario
                                    LEFT JOIN modalidad AS m ON ac.idModalidad = m.id
                                    LEFT JOIN tipo AS ti ON ac.idTipo = ti.id;");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e);
        }
    }

    public function getById($idActividad)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT ac.idActividad, ac.nombre AS nombreActividad, ti.tipo, ac.status, ac.dirigidoA,
                                                ac.objetivo, us.nombre, us.paterno, us.materno, m.nombre AS modalidad, ac.duracion,
                                                ac.fechaImp, ac.horaImp
                                            FROM actividad AS ac
                                            LEFT JOIN instructor AS i ON ac.idInstructor = i.idInstructor
                                            LEFT JOIN usuario AS us ON i.idUsuario = us.idUsuario
                                            LEFT JOIN modalidad AS m ON ac.idModalidad = m.id
                                            LEFT JOIN tipo AS ti ON ac.idTipo = ti.id WHERE ac.idActividad = ?;");
            $stmt->bindValue(1, $idActividad);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            error_log("Error getting actividad by ID: " . $e->getMessage());
        }
    }

    public function save(BeanActivity $beanActividad)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("INSERT INTO actividad (idInstructor, idTipo, nombre, 
            duracion, horasPresencial, horasLinea, horasIndependiente,idClasificacion, 
            idModalidad, dirigidoA, perfilIngreso, perfilEgreso, objetivo, temario, cupo, 
            presentacion, fechaImp, horaImp) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bindValue(1, $beanActividad->getIdInstructor());
            $stmt->bindValue(2, $beanActividad->getIdTipo());
            $stmt->bindValue(3, $beanActividad->getNombre());
            $stmt->bindValue(4, $beanActividad->getDuracion());
            $stmt->bindValue(5, $beanActividad->getHorasPresencial());
            $stmt->bindValue(6, $beanActividad->getHorasLinea());
            $stmt->bindValue(7, $beanActividad->getHorasIndependiente());
            $stmt->bindValue(8, $beanActividad->getIdClasificacion());
            $stmt->bindValue(9, $beanActividad->getIdModalidad());
            $stmt->bindValue(10, $beanActividad->getDirigidoA());
            $stmt->bindValue(11, $beanActividad->getPerfilIngreso());
            $stmt->bindValue(12, $beanActividad->getPerfilEgreso());
            $stmt->bindValue(13, $beanActividad->getObjetivo());
            $stmt->bindValue(14, $beanActividad->getTemario());
            $stmt->bindValue(15, $beanActividad->getCupo());
            $stmt->bindValue(16, $beanActividad->getPresentacion());
            $stmt->bindValue(17, $beanActividad->getFecha());
            $stmt->bindValue(18, $beanActividad->getHora());

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Save actividad failed: " . $e->getMessage());
        }
    }

    public function update(BeanActivity $beanActividad, $idActividad)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("UPDATE actividad SET idModalidad = ?, nombre = ?, 
            dirigidoa = ?, objetivo = ?, idInstructor = ?, idTipo = ?, fechaImp = ?, 
            duracion = ?, horaImp = ? WHERE idActividad = ?;");
            $stmt->bindValue(1, $beanActividad->getIdModalidad());
            $stmt->bindValue(2, $beanActividad->getNombre());
            $stmt->bindValue(3, $beanActividad->getDirigidoA());
            $stmt->bindValue(4, $beanActividad->getObjetivo());
            $stmt->bindValue(5, $beanActividad->getIdInstructor());
            $stmt->bindValue(6, $beanActividad->getIdTipo());
            $stmt->bindValue(7, $beanActividad->getFecha());
            $stmt->bindValue(8, $beanActividad->getDuracion());
            $stmt->bindValue(9, $beanActividad->getHora());
            $stmt->bindParam(10, $idActividad);

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Update Activity failed: " . $e->getMessage());
        }
    }

    public function sendToPublic($idActividad)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare('UPDATE actividad SET status = true WHERE idActividad = ?;');
            $stmt->bindParam(1, $idActividad);

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Send To Public failed " . $e->getMessage());
        }
    }

    public function delete($idActividad)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("DELETE FROM actividad WHERE idactividad = ?");
            $stmt->bindParam(1, $idActividad);

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Delete actividad failed: " . $e->getMessage());
            return false;
        }
    }

    public function getYear()
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT EXTRACT(YEAR FROM fechaImp) AS anio FROM actividad;");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get year failed: " . $e->getMessage());
        }
    }

    public function queryForYear($year)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT
                    a.nombre AS nombre_actividad,
                    CONCAT(u.nombre, ' ', u.paterno, ' ', u.materno) AS nombre_instructor,
                    a.fechaImp AS fecha,
                    a.duracion,
                    c.nombre AS categoria,
                    t.tipo AS tipo,
                    COUNT(i.idInscripcion) AS num_participantes
                FROM ACTIVIDAD a
                JOIN INSTRUCTOR ins ON a.idInstructor = ins.idInstructor
                JOIN USUARIO u ON ins.idUsuario = u.idUsuario
                JOIN CLASIFICACION c ON a.idClasificacion = c.id
                JOIN TIPO t ON a.idTipo = t.id
                LEFT JOIN INSCRIPCION i ON a.idActividad = i.idActividad
                WHERE EXTRACT(YEAR FROM a.fechaImp) = ?
                GROUP BY a.nombre, u.nombre, u.paterno, u.materno, a.fechaImp, a.duracion, c.nombre, t.tipo
                ORDER BY a.fechaImp;");

            $stmt->bindValue(1, $year);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get Activities For Year failed: " . $e->getMessage());
        }
    }

    public function queryForGender($actividad)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT
                    a.nombre AS actividad,
                    SUM(CASE WHEN d.sexo = 'M' THEN 1 ELSE 0 END) AS total_hombres,
                    SUM(CASE WHEN d.sexo = 'F' THEN 1 ELSE 0 END) AS total_mujeres,
                    COUNT(i.idInscripcion) AS total_participantes
                FROM
                    ACTIVIDAD a
                JOIN
                    INSCRIPCION i ON a.idActividad = i.idActividad
                JOIN
                    DOCENTE d ON i.idDocente = d.idDocente
                WHERE
                    a.idActividad = ?
                GROUP BY
                    a.nombre;");

            $stmt->bindValue(1, $actividad);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get Activities For Gender failed: " . $e->getMessage());
        }
    }

    public function getListForActivity($idActividad)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT ins.idDocente, ins.idActividad, CONCAT(doc.nombre, ' ', doc.paterno, ' ', doc.materno) AS nombreDocente, ins.evaluacion, ins.comentarios
                FROM inscripcion AS ins
                LEFT JOIN docente AS doc
                ON ins.idDocente = doc.idDocente
                WHERE idActividad = ?;");

            $stmt->bindParam(1, $idActividad);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get List For Activities failed: " . $e->getMessage());
        }
    }
}