<?php
require __DIR__."/../../../src/config/PostgreSQL.php";
class AuthService
{
    public function login($usuario, $password){
        try {
            $postgres = new PostgreSQL;
            $conn = $postgres->connect();

            $stmt = $conn->prepare("SELECT * FROM develop.usuario WHERE usuario = :user AND password = :pass");
            $stmt->bindParam(':user', $usuario);
            $stmt->bindParam(':pass', $password);
            $stmt->execute();

            $rs = $stmt->fetch();

            if (!$rs) {
                echo "Usuario o Contraseña Incorrecta";
            } else {
                echo "Sesion Exiotosa, Eres Perro wey";
                return $rs;
                /*echo "ID: " . $rs['idusuario'] . "<br>";
                echo "Usuario: " . $rs['usuario'] . "<br>";
                echo "Nombre: " . $rs['nombre'] . "<br>";
                echo "A. Paterno: " . $rs['paterno'] . "<br>";
                echo "A. Materno: " . $rs['materno'] . "<br>";*/
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}