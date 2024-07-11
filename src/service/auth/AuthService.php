<?php
require __DIR__."/../../../src/config/PostgreSQL.php";

class AuthService {
    public function login($usuario, $password) {
        try {
            $postgres = new PostgreSQL();
            $conn = $postgres->connect();

            // Consulta a la base de datos
            $stmt = $conn->prepare("SELECT * FROM usuario WHERE usuario = :user AND password = :pass");
            $stmt->bindParam(':user', $usuario);
            $stmt->bindParam(':pass', $password);
            $stmt->execute();

            $rs = $stmt->fetch();

            if (!$rs) {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de autenticación',
                        text: 'Usuario o contraseña incorrectos',
                        showConfirmButton: true
                    }).then(() => {
                        window.location.href = '../../webapp/login.php';
                    });
                </script>";
                return false;
            } else {
                // Iniciar sesión y establecer variables de sesión
                session_start();
                $_SESSION['idUsuario'] = $rs['idusuario'];
                $_SESSION['idRol'] = $rs['idrol']; // Asegúrate de que este campo existe en tu tabla
                header("Location: ../../webapp/perfil.php");
                exit();
                return true;
            }
        } catch (Exception $e) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '" . $e->getMessage() . "',
                    showConfirmButton: true
                }).then(() => {
                    window.location.href = '../../webapp/login.php';
                });
            </script>";
            return false;
        }
    }
}
