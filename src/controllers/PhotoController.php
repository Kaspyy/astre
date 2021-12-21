<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/UserPhoto.php';
require_once __DIR__.'/../repository/UserPhotoRepository.php';

class PhotoController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $userPhotoRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userPhotoRepository = new UserPhotoRepository();
    }

    public function profile()
    {
        $userPhoto = $this->userPhotoRepository->getPhoto(1);
        $this->render('profile', ['userPhoto' => $userPhoto]);
    }

    public function edit_profile()
    {
        $userPhoto = $this->userPhotoRepository->getPhoto(1);
        $this->render('edit_profile', ['userPhoto' => $userPhoto]);
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

            return $this->render('edit_profile', ['messages' => $this->messages, 'userPhoto' => $userPhoto] );
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

}