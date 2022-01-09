<?php

class UserBio
{
    private $bio;

    public function __construct($bio)
    {
        $this->bio = $bio;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio): void
    {
        $this->bio = $bio;
    }


}