<?php

require_once 'Repository.php';
require_once __DIR__ . "/../models/UserDetails.php";
require_once __DIR__ . "/../models/UserBio.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/UserChat.php";

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

        if ($userDetails == false) {
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
        $email = $user->getEmail();
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

        if ($userBio == false) {
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

    public function updateUserGender(string $userGender, int $id): void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE user_account SET gender_id = :gender_id where id = :id');
        if ($userGender == "Man") {
            $gender_id = 2;
        } else {
            $gender_id = 1;
        }
        $stmt->bindParam(':gender_id', $gender_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function updateUserInterest(string $userInterest, int $id): void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE interested_in_gender SET gender_id = :gender_id where user_account_id = :id');
        if ($userInterest == "Men") {
            $gender_id = 2;
        } else {
            $gender_id = 1;
        }
        $stmt->bindParam(':gender_id', $gender_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function getChats(int $user_account_id): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT iui.id,
                   user_id,
                   name,
                   photo
    FROM (
         SELECT conversation.id,
                CASE
                    WHEN
                        conversation.user_account_id = :user_account_id
                        THEN
                        (
                            SELECT ua.id
                            FROM conversation
                                     JOIN
                                 participant p ON conversation.id = p.conversation_id
                                     JOIN
                                 user_account ua ON ua.id = p.user_account_id
                            WHERE conversation.user_account_id = :user_account_id)
                    WHEN p.user_account_id = :user_account_id THEN 
                        (SELECT ua.id
                         FROM conversation
                                  JOIN
                              participant p ON conversation.id = p.conversation_id
                                  JOIN
                              user_account ua ON ua.id = conversation.user_account_id
                         WHERE p.user_account_id = :user_account_id)
                    END AS user_id
         FROM conversation
                  JOIN
              participant p ON conversation.id = p.conversation_id) AS iui
         JOIN user_account ua ON iui.user_id = ua.id
         JOIN user_photo up ON ua.id = up.user_account_id
        ');
        $stmt->bindParam(':user_account_id', $user_account_id, PDO::PARAM_INT);
        $stmt->execute();
        $userChats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($userChats as $userChat) {
            $result[] = new UserChat(
                $userChat['chatId'],
                $userChat['id'],
                $userChat['name'],
                $userChat['photo']
            );
        }
        return $result;
    }

}