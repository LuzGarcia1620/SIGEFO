<?php
require __DIR__."/../../service/user/UserService.php";
require __DIR__."/../../model/user/BeanUser.php";

class UserController
{
    private $userService;

    public function __construct(){
        $this->userService = new UserService();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];

            switch ($action) {
                case 'save':
                    $service = $this->userService;

                    $beanUser = new BeanUser(
                        $_POST['usuario'],
                        $_POST['password'],
                        $_POST['nombre'],
                        $_POST['apellidoPaterno'],
                        $_POST['apellidoMaterno'],
                        $_POST['correo'],
                        $_POST['rol']
                    );

                    $service->save($beanUser);
                    break;
                case 'update':
                    break;
                case 'delete':
                    break;
                case 'change':
                    break;
                default:
                    echo "Invalid request method";
                    break;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $user = $this->userService->getById($id);

                return $user;
            } else {
                $users = $this->userService->getAll();

                return $users ? $users : array();
            }
        }
    }
}

