<?php

require_once 'Repository.php';
require_once __DIR__."/../models/UserDetails.php";

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

    public function updateUserDetails(UserDetails $userDetails): void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE user_account SET name = :name, birthday = :birthday where id = 1');

        $stmt->execute([
            $userDetails->getName(),
            $userDetails->getBirthday()
        ]);
    }

}