<?php
require __DIR__."/../../../src/config/PostgreSQL.php";

class AuthService {
    public function login($usuario, $password) {
        try {
            $postgres = new PostgreSQL();
            $conn = $postgres->connect();

            $hash_password = sha1($password);

            // Consulta a la base de datos
            $stmt = $conn->prepare("SELECT u.idUsuario, u.nombre, 
            u.paterno, u.materno, u.usuario, u.correo, u.password, 
            u.status, r.nombre AS rol FROM usuario as u 
            JOIN rol as r ON u.idRol = r.id WHERE usuario = ? AND password = ?;");
            $stmt->bindParam(1, $usuario);
            $stmt->bindParam(2, $hash_password);
            $stmt->execute();

            return $stmt->fetch();

        } catch (Exception $e) {
            error_log("User not found" . $e->getMessage());
        }
    }
}
