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

    public function queryForUnit($unit)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT
                    act.nombre AS nombre_actividad,
                    CONCAT(u.nombre, ' ', u.paterno, ' ', u.materno) AS nombre_instructor,
                    act.fechaImp AS fecha,
                    act.duracion AS duracion,
                    c.nombre AS categoria,
                    t.tipo AS tipo,
                    COUNT(i.idInscripcion) AS num_participantes
                FROM
                    ACTIVIDAD act
                    INNER JOIN INSTRUCTOR ins ON act.idInstructor = ins.idInstructor
                    INNER JOIN USUARIO u ON ins.idUsuario = u.idUsuario
                    INNER JOIN TIPO t ON act.idTipo = t.id
                    INNER JOIN CLASIFICACION c ON act.idClasificacion = c.id
                    INNER JOIN UNIDAD_ACADEMICA ua ON ua.id = ins.idArea
                    LEFT JOIN INSCRIPCION i ON act.idActividad = i.idActividad
                WHERE
                    ua.id = ?
                GROUP BY
                    act.nombre,
                    u.nombre,
                    u.paterno,
                    u.materno,
                    act.fechaImp,
                    act.duracion,
                    c.nombre,
                    t.tipo;");

            $stmt->bindValue(1, $unit);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get Activitys For Unit Error: " . $e->getMessage());
        }
    }
}