<?php

require_once 'Repository.php';
require_once __DIR__."/../models/User.php";

class UserPhotoRepository extends Repository
{
    public function getPhoto(int $user_account_id): ?UserPhoto
    {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM user_photo WHERE user_account_id = :user_account_id"
        );
        $stmt->bindParam(':user_account_id', $user_account_id, PDO::PARAM_INT);
        $stmt->execute();

        $userPhoto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userPhoto == false) {
            return null;
        }

        return new UserPhoto(
            $userPhoto['photo']
        );
    }

    public function addPhoto(UserPhoto $userPhoto, int $user_account_id): void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE user_photo SET photo = :userPhoto WHERE user_account_id = :user_account_id');

        $photo = $userPhoto->getPhoto();
        $stmt->bindParam(':user_account_id', $user_account_id, PDO::PARAM_INT);
        $stmt->bindParam(':userPhoto', $photo);
        $stmt->execute();
    }

    public function getPhotos(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_photo
        ');
        $stmt->execute();
        $userPhotos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($userPhotos as $userPhoto) {
            $result[] = new userPhoto(
              $userPhoto['photo']
            );
        }
        return $result;
    }

}