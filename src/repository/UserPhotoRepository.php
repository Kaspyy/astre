<?php

require_once 'Repository.php';
require_once __DIR__."/../models/User.php";

class UserPhotoRepository extends Repository
{
    public function getPhoto(string $email): ?UserPhoto
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
        INSERT INTO user_photo (id, user_account_id, photo) values (?, ?, ?)');

        $id = 1;
        $user_account_id = 1;
        $stmt->execute([
            $id,
            $user_account_id,
            $userPhoto->getPhoto()
        ]);
    }
}