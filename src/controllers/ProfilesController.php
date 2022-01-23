<?php
require_once 'AppController.php';
require_once 'SessionController.php';
require_once __DIR__ . '/../models/UserProfile.php';
require_once __DIR__ . '/../repository/ProfilesRepository.php';
require_once __DIR__ . '/../repository/UserDetailsRepository.php';

class ProfilesController extends AppController
{
    private $id;
    private $sessionController;
    private $profilesRepository;
    private $userDetailsRepository;


    public function __construct()
    {
        parent::__construct();
        $this->sessionController = new SessionController();
        $this->profilesRepository = new ProfilesRepository();
        $this->userDetailsRepository = new UserDetailsRepository();
    }

    public function swipe()
    {
        $this->id = $this->sessionController->get("id");
        $profiles = $this->profilesRepository->getProfiles($this->id);
        $userDetails = $this->userDetailsRepository->getUserDetails($this->id);
        $this->render('swipe', ['profiles' => $profiles, 'userDetails' => $userDetails]);
    }

    public function giveLike($userId, $receiverId)
    {
        $this->profilesRepository->giveLike($userId, $receiverId);
        http_response_code(200);
    }


}