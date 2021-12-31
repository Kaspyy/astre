<?php

class User
{
    private $email;
    private $password;
    private $id;

    public function __construct($email, $password, $id)
    {
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


}