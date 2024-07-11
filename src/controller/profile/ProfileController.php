<?php
require __DIR__ . "/../../service/profile/ProfileService.php";
require __DIR__ . "/../../model/profile/BeanProfile.php";

class ProfileController
{
    private $profileService;
    private $beanProfile;

    public function __construct()
    {
        $this->profileService = new ProfileService();
        $this->beanProfile = new BeanProfile();
    }

    public function handleRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $profiles = $this->profileService->getById($id);

                return $profiles;
            } else {
                $profiles = $this->profileService->getAll();

                return $profiles ? $profiles : array();
            }
        }
    }
}