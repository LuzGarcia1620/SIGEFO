<?php
require __DIR__."/../../../src/config/PostgreSQL.php";

class UserService
{
    public function getAll() {
        try {
            $postgres = new PostgreSQL;
            $conn = $postgres->connect();

            $stmt = $conn->prepare("SELECT u.idusuario, u.usuario, u.nombre, u.paterno, u.materno, u.correo, r.nombre AS rol FROM usuario AS u JOIN rol AS r ON r.id = u.idrol;");
            $stmt->execute();

            $rs = $stmt->fetchAll();

            return $rs;
        }catch (Exception $e) {
            error_log($e);
        }
    }
}