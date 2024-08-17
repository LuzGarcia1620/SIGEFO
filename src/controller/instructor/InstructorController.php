<?php
require_once __DIR__."/../../service/instructor/InstructorService.php";

class InstructorController
{
    private $instructorService;

    public function __construct(){
        $this->instructorService = new InstructorService();
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['instructor'])) {
                $id = intval($_GET['instructor']);
                $activity = $this->instructorService->queryGetActivityForInstructor($id);

                return $activity;
            }
        }
    }
}