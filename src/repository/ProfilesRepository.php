<?php

require_once 'Repository.php';
require_once __DIR__ . "/../models/UserProfile.php";

class ProfilesRepository extends Repository
{
    public function getProfiles(int $user_account_id): ?array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare(
            "SELECT user_account.id as user_id,
       user_account.name as name,
       bio,
       birthday,
       photo,
       g.name as gender
FROM user_account
         join gender g on gender_id = g.id
    join location l on l.location_id = user_account.location_id
         join user_photo up on user_account.id = up.user_account_id
         join user_hobby uh on user_account.id = uh.user_account_id
where user_account.id != :user_account_id"
        );
        $stmt->bindParam(':user_account_id', $user_account_id, PDO::PARAM_INT);
        $stmt->execute();

        $userProfiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($userProfiles as $userProfile) {
            $result[] = new UserProfile(
                $userProfile['user_id'],
                $userProfile['name'],
                $userProfile['bio'],
                $userProfile['birthday'],
                $userProfile['photo'],
                $userProfile['gender'],
            );
        }
        return $result;
    }

}