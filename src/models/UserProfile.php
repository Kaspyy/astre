<?php

class UserProfile extends UserDetails
{
    private $id;
    private $name;
    private $bio;
    private $birthday;
    private $photo;
    private $gender;


    public function __construct($id, $name, $bio, $birthday, $photo, $gender)
    {
        parent::__construct($name, $birthday);
        $this->id = $id;
        $this->name = $name;
        $this->bio = $bio;
        $this->birthday = $birthday;
        $this->photo = $photo;
        $this->gender = $gender;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getGender()
    {
        return $this->gender;
    }

}


