<?php

require_once 'Repository.php';
require_once __DIR__."/../models/User.php";

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM public.user_account WHERE email = :email"
        );
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['id']
        );
    }

    public function getUserById(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM public.user_account WHERE id = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['id']
        );
    }

    public function addUser(User $user, UserDetails $userDetails)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_account (email, password)
            VALUES (?, ?) RETURNING id
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
        ]);

        $id = $stmt->fetchColumn();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_photo (user_account_id) VALUES (?)
        ');
        $stmt->execute([$id]);

        $name = $userDetails->getName();
        $birthday = $userDetails->getBirthday();

        $stmt = $this->database->connect()->prepare('
        UPDATE user_account SET name = :name, birthday = :birthday where id = :id');


        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }

}