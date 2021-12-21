<?php

require_once 'Repository.php';
require_once __DIR__."/../models/User.php";

class UserPhotoRepository extends Repository
{
    public function getPhoto(int $id): ?UserPhoto
    {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM user_photo WHERE id = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $userPhoto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userPhoto == false) {
            return null;
        }

        return new UserPhoto(
            $userPhoto['photo']
        );
    }

    public function addPhoto(UserPhoto $userPhoto): void
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO user_photo (user_account_id, photo) values (?, ?)');

        $user_account_id = 1;
        $stmt->execute([
            $user_account_id,
            $userPhoto->getPhoto()
        ]);
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