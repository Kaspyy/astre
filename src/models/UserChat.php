<?php

class UserChat extends User
{
    private $id;
    private $name;
    private $photo;
    //TODO add message snippet (if deadlines allow)

    public function __construct($id, $name, $photo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->photo = $photo;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhoto()
    {
        return $this->photo;
    }




}