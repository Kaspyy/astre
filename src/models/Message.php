<?php

class Message
{
    private $sender;
    private $receiver;
    private $content;

    public function __construct($sender, $receiver, $content)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->content = $content;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function getReceiver()
    {
        return $this->receiver;
    }

    public function getContent(): string
    {
        return $this->content;
    }


}