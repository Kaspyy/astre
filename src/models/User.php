<?php

class User
{
    private $email;
    private $password;
    private $name;

    public function __construct($email, $password, $name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
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