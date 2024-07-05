<?php
require __DIR__."/../../../src/config/PostgreSQL.php";

class UserService
{
    private $postgres;

    public function __construct() {
        $this->postgres = new PostgreSQL;
    }

    public function getAll() {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT u.idusuario, u.usuario, u.nombre, u.paterno, u.materno, u.correo, r.nombre AS rol FROM usuario AS u JOIN rol AS r ON r.id = u.idrol;");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e);
        }
    }

    public function save(BeanUser $beanUser) {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("INSERT INTO usuario (usuario, password, nombre, paterno, materno, correo, idRol) VALUES (?, ?, ?, ?, ?, ?, ?);");
            $stmt->bindValue(1, $beanUser->getUsuario());
            $stmt->bindValue(2, $beanUser->getPassword());
            $stmt->bindValue(3, $beanUser->getNombre());
            $stmt->bindValue(4, $beanUser->getPaterno());
            $stmt->bindValue(5, $beanUser->getMaterno());
            $stmt->bindValue(6, $beanUser->getCorreo());
            $stmt->bindValue(7, $beanUser->getIdRol());

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Save user failed: " . $e->getMessage());
        }
    }

    /*public function delete($idUsuario) {
        $sql = "DELETE FROM usuario WHERE idUsuario = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$idUsuario]);
    }*/
    
}