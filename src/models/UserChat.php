<?php

class UserChat extends User
{
    private $chatId;
    private $id;
    private $name;
    private $photo;
    //TODO add message snippet (if deadlines allow)

    public function __construct($chatId, $id, $name, $photo)
    {
        $this->chatId = $chatId;
        $this->id = $id;
        $this->name = $name;
        $this->photo = $photo;
    }

    function getChatId()
    {
        return $this->chatId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhoto()
    {
        return $this->photo;
    }



}