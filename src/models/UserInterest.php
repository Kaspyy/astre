<?php

class UserInterest
{
    private $gender_id;

    public function __construct($gender)
    {
        $this->gender_id = $gender;
    }

    public function getUserInterest()
    {
        return $this->gender_id;
    }


}