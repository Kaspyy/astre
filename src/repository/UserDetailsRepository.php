<?php

require_once 'Repository.php';
require_once __DIR__."/../models/UserDetails.php";
require_once __DIR__."/../models/UserBio.php";
require_once __DIR__."/../models/User.php";

class UserDetailsRepository extends Repository
{
    public function getUserDetails(int $id): ?UserDetails
    {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM user_account WHERE id = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userDetails== false) {
            return null;
        }

        return new UserDetails(
            $userDetails['name'],
            $userDetails['birthday']
        );
    }

    public function updateUserDetails(User $user, UserDetails $userDetails, int $id): void
    {
        $name = $userDetails->getName();
        $birthday = $userDetails->getBirthday();
        $email =  $user->getEmail();
        $password = $user->getPassword();
        $hashedPassword = md5($password);

        $stmt = $this->database->connect()->prepare('
        UPDATE user_account SET name = :name, birthday = :birthday, email = :email, password = :password where id = :id');


        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

    }

    public function getUserBio(int $id): ?UserBio
    {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM user_account WHERE id = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $userBio = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userBio== false) {
            return null;
        }

        return new UserBio(
            $userBio['bio']
        );
    }

    public function updateUserBio(UserBio $userBio, int $id): void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE user_account SET bio = :bio where id = :id');

        $bio = $userBio->getBio();
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}