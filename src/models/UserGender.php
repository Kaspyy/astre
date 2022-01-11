<?php

class UserGender
{
    private $gender;

    public function __construct($gender)
    {
        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }


}