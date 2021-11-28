<?php

class UserPhoto extends User
{
    private $photo;

    public function __construct($photo)
    {
        $this->photo = $photo;
    }

    public function getPhoto()
    {
        return $this->photo;
    }


    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }



}