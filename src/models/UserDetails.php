<?php

class UserDetails extends User
{
    private $name;
    private $birthday;


    public function __construct($name, $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getAge()
    {
        $birthday = $this->getBirthday();
        $from = new DateTime($birthday);
        $to   = new DateTime('today');
        echo $from->diff($to)->y;
    }


}