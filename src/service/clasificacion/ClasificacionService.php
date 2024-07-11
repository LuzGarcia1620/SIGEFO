<?php
require __DIR__ . "/../../../src/config/PostgreSQL.php";

class UserService
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

            $stmt = $conn->prepare("SELECT ");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Get All Error: " . $e->getMessage());
        }
    }

    public function save(BeanUser $beanUser)
    {
        try {
            $conn = $this->postgres->connect();

            $stmt = $conn->prepare("INSERT INTO usuario (usuario, password, nombre, paterno, materno, correo, idRol, status) VALUES (?, ?, ?, ?, ?, ?, ?, true);");
            $stmt->bindValue(1, $beanClasificacion->getUsuario());
            $stmt->bindValue(2, $beanClasificacion->getPassword());
            $stmt->bindValue(3, $beanClasificacion->getNombre());
            $stmt->bindValue(4, $beanClasificacion->getPaterno());
            $stmt->bindValue(5, $beanClasificacion->getMaterno());
            $stmt->bindValue(6, $beanClasificacion->getCorreo());
            $stmt->bindValue(7, $beanClasificacion->getIdRol());

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

            $user = $conn->prepare("SELECT * FROM usuario WHERE idUsuario = ?;");
            $user->bindValue(1, $idUsuario);
            $user->execute();
            $userFound = $user->fetch();

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
}