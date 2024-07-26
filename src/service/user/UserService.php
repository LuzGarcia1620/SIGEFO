<?php
require_once __DIR__ . "/../../../src/config/PostgreSQL.php";

class UserService
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

            $stmt = $conn->prepare("SELECT u.idusuario, u.usuario, u.nombre, u.paterno, u.materno, u.correo, r.nombre AS rol, u.status FROM usuario AS u JOIN rol AS r ON r.id = u.idrol;");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get All Error: " . $e->getMessage());
        }
    }

    public function getOne($idUsuario)
    {
        try {
            $conn = $this->postgres->connect();
            $stmt = $conn->prepare("SELECT u.idUsuario, u.nombre, u.paterno, u.materno, u.usuario, u.correo, u.password, u.status, r.nombre AS rol FROM usuario as u JOIN rol as r ON u.idRol = r.id WHERE u.idUsuario = ?;");
            $stmt->bindParam(1, $idUsuario);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            error_log("Get One Error: " . $e->getMessage());
        }
    }

    public function save(BeanUser $beanUser)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("INSERT INTO usuario (usuario, password, nombre, paterno, materno, correo, idRol, status) VALUES (?, ?, ?, ?, ?, ?, ?, true);");
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

    public function update(BeanUser $beanUser, $idUsuario)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("UPDATE usuario SET usuario = ?, nombre = ?, paterno = ?, materno = ?, correo = ? WHERE idUsuario = ?;");
            $stmt->bindValue(1, $beanUser->getUsuario());
            $stmt->bindValue(2, $beanUser->getNombre());
            $stmt->bindValue(3, $beanUser->getPaterno());
            $stmt->bindValue(4, $beanUser->getMaterno());
            $stmt->bindValue(5, $beanUser->getCorreo());
            $stmt->bindParam(6, $idUsuario);

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Update user failed: " . $e->getMessage());
        }
    }

    public function delete($idUsuario)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("DELETE FROM usuario WHERE idUsuario = ?;");
            $stmt->bindParam(1, $idUsuario);

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Delete user failed: " . $e->getMessage());
        }
    }

    public function changeStatus($idUsuario)
    {
        try {
            $conn = $this->postgres->connect();

            $userFound = $this->getOne($idUsuario);

            if ($userFound['status'] == 1) {
                $stmt = $conn->prepare("UPDATE usuario SET status = false WHERE idUsuario = ?;");
                $stmt->bindParam(1, $idUsuario);
            } else {
                $stmt = $conn->prepare("UPDATE usuario SET status = true WHERE idUsuario = ?;");
                $stmt->bindParam(1, $idUsuario);
            }

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Change status user failed: " . $e->getMessage());
        }
    }

    public function getAllInstructors()
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("SELECT us.nombre, us.paterno, us.materno, ins.idInstructor FROM usuario AS us JOIN instructor AS ins ON us.idUsuario = ins.idUsuario WHERE us.idRol = '3';");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get All Instructors Error: " . $e->getMessage());
        }
    }
}