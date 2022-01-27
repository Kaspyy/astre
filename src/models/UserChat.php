<?php

class UserChat
{
    private $chatId;
    private $id;
    private $name;
    private $photo;
    private $messageSnippet;//TODO add message snippet (if deadlines allow)

    public function __construct($chatId, $id, $name, $photo, $messageSnippet)
    {
        $this->chatId = $chatId;
        $this->id = $id;
        $this->name = $name;
        $this->photo = $photo;
        $this->messageSnippet = $messageSnippet;
    }


    function getChatId(): int
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

    public function getMessageSnippet()
    {
        return $this->messageSnippet;
    }



}