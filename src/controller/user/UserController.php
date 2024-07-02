<?php
require __DIR__."/../../service/user/UserService.php";

class UserController
{
    private $userService;

    public function __construct(){
        $this->userService = new UserService();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = $_POST["action"];
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

