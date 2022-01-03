<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserPhoto.php';
require_once __DIR__.'/../repository/UserPhotoRepository.php';
require_once __DIR__.'/../models/UserDetails.php';
require_once __DIR__.'/SessionController.php';
require_once __DIR__.'/../models/UserBio.php';
require_once __DIR__.'/../repository/UserDetailsRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class UserInfoController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $userPhotoRepository;
    private $userDetailsRepository;
    private int $id;
    private $userRepository;
    private $sessionController;


    public function __construct()
    {
        parent::__construct();
        $this->sessionController = new SessionController();
        $this->userPhotoRepository = new UserPhotoRepository();
        $this->userDetailsRepository = new UserDetailsRepository();
        $this->userRepository = new UserRepository();
    }

    public function profile()
    {
        $this->id = $this->sessionController->get("id");
        $userPhoto = $this->userPhotoRepository->getPhoto($this->id);
        $userDetails = $this->userDetailsRepository->getUserDetails($this->id);
        $this->render('profile', ['userPhoto' => $userPhoto, 'userDetails' => $userDetails]);
    }

    public function edit_profile()
    {
        $this->id = $this->sessionController->get("id");
        $userPhoto = $this->userPhotoRepository->getPhoto($this->id);
        $userBio = $this->userDetailsRepository->getUserBio($this->id);
        $this->render('edit_profile', ['userPhoto' => $userPhoto, 'userBio' => $userBio]);
    }

    public function uploadPhoto()
    {
        $this->id = $this->sessionController->get("id");
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) & $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $userPhoto = new UserPhoto($_FILES['file']['name']);
            $this->userPhotoRepository->addPhoto($userPhoto, $this->id);

            return $this->edit_profile();
        }
        $this->render('upload_photo', ['messages' => $this->messages]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE)
        {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if (isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES))
        {
            $this->messages[] = 'File type is not supported';
            return false;
        }
        return true;
    }

    public function updateUserDetails()
    {
        $this->id = $this->sessionController->get("id");
        $userDetails = new UserDetails($_POST['name'], $_POST['birthday']);
        $user = new User($_POST['email'], $_POST['password'], $this->id);
        $this->userDetailsRepository->updateUserDetails($user, $userDetails, $this->id);

        $this->settings();
    }
    public function settings()
    {
        $this->id = $this->sessionController->get("id");
        $userDetails = $this->userDetailsRepository->getUserDetails($this->id);
        $user = $this->userRepository->getUserById($this->id);
        $this->render('settings', ['userDetails' => $userDetails, 'user' =>$user]);
    }

    public function updateUserBio()
    {
        $this->id = $this->sessionController->get("id");
        $userBio = new UserBio($_POST['bio']);
        $this->userDetailsRepository->updateUserBio($userBio, $this->id);

        $this->edit_profile();
    }

    public function updateUserGender()
    {
        $this->id = $this->sessionController->get("id");
        $chosenGender = $_POST['gender'];
        if ($chosenGender == "Man") {
            $userGender = "Man";
        }
        else {
            $userGender = "Woman";
        }
        $this->userDetailsRepository->updateUserGender($userGender, $this->id);

        $this->edit_profile();
    }
    public function updateUserInterest()
    {
        $this->id = $this->sessionController->get("id");
        $chosenInterest = $_POST['gender'];
        if ($chosenInterest == "Men") {
            $userInterest = "Men";
        }
        else {
            $userInterest = "Women";
        }
        $this->userDetailsRepository->updateUserInterest($userInterest, $this->id);

        $this->edit_profile();
    }

}