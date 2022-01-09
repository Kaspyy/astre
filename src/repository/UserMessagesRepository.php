<?php

require_once 'Repository.php';
require_once __DIR__ . "/../models/UserDetails.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Message.php";
require_once __DIR__ . "/../models/UserChat.php";

class UserMessagesRepository extends Repository
{

    public function sendMessage(int $chat_id, Message $message)
    {
        if (!empty($message->getContent())) {

            $stmt = $this->database->connect()->prepare('
                INSERT INTO message (conversation_id, sender_id, receiver_id, message_content) VALUES (?, ?, ?, ?)
            ');

            $stmt->execute([
                $chat_id,
                $message->getSender(),
                $message->getReceiver(),
                $message->getContent()
            ]);
        }
        else
            header("chats");
    }

    public function getMessages(int $sender, int $receiver): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
                       SELECT sender_id, receiver_id, message_content
            FROM message
            where sender_id = :sender and receiver_id = :receiver
               or sender_id = :receiver and receiver_id = :sender
            ORDER BY id ASC
        ');

        $stmt->bindParam(':sender', $sender);
        $stmt->bindParam(':receiver', $receiver);
        $stmt->execute();

        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($messages as $message) {
            $result[] = new Message(
                $message['sender_id'],
                $message['receiver_id'],
                $message['message_content']
            );
        }

        return $result;

    }


}