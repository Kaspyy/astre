<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/UserPhoto.php';
require_once __DIR__.'/../repository/UserPhotoRepository.php';
require_once __DIR__.'/../models/UserDetails.php';
require_once __DIR__.'/../models/UserBio.php';
require_once __DIR__.'/../repository/UserDetailsRepository.php';

class UserInfoController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $userPhotoRepository;
    private $userDetailsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userPhotoRepository = new UserPhotoRepository();
        $this->userDetailsRepository = new UserDetailsRepository();
    }

    public function profile()
    {
        $userPhoto = $this->userPhotoRepository->getPhoto(1);
        $userDetails = $this->userDetailsRepository->getUserDetails(1);
        $this->render('profile', ['userPhoto' => $userPhoto, 'userDetails' => $userDetails]);
    }

    public function edit_profile()
    {
        $userPhoto = $this->userPhotoRepository->getPhoto(1);
        $userBio = $this->userDetailsRepository->getUserBio(1);
        $this->render('edit_profile', ['userPhoto' => $userPhoto, 'userBio' => $userBio]);
    }

    public function uploadPhoto()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) & $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $userPhoto = new UserPhoto($_FILES['file']['name']);
            $this->userPhotoRepository->addPhoto($userPhoto);

            return $this->render('edit_profile', ['messages' => $this->messages, 'userPhoto' => $userPhoto]);
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
        $userDetails = new UserDetails($_POST['name'], $_POST['birthday']);
        $this->userDetailsRepository->updateUserDetails($userDetails);

        return $this->render('settings', [
            'messages' => $this->message,
            'userDetails' => $this->userDetailsRepository->getUserDetails(1)
        ]);
    }
    public function settings()
    {
        $userDetails = $this->userDetailsRepository->getUserDetails(1);
        $this->render('settings', ['userDetails' => $userDetails]);
    }

    public function updateUserBio()
    {
        $userBio = new UserBio($_POST['bio']);
        $this->userDetailsRepository->updateUserBio($userBio);

        return $this->render('edit_profile', [
            'messages' => $this->message,
            'userBio' => $this->userDetailsRepository->getUserBio(1)
        ]);
    }


}