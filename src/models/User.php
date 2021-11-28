<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $bio;
    private $gender;
    private $interest;

    public function __construct($email, $password, $name, $bio, $gender, $interest)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->bio = $bio;
        $this->gender = $gender;
        $this->interest = $interest;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getBio():string
    {
        return $this->bio;
    }


    public function setBio(string $bio)
    {
        $this->bio = $bio;
    }


    public function getGender()
    {
        return $this->gender;
    }


    public function setGender($gender)
    {
        $this->gender = $gender;
    }


    public function getInterest()
    {
        return $this->interest;
    }


    public function setInterest($interest)
    {
        $this->interest = $interest;
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