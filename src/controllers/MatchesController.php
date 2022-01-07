<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/UserDetailsRepository.php';
require_once __DIR__.'/SessionController.php';

class MatchesController extends AppController
{
    private $userDetailsRepository;
    private $id;
    private $sessionController;

    public function __construct()
    {
        parent::__construct();
        $this->sessionController = new SessionController();
        $this->userDetailsRepository = new UserDetailsRepository();
        //var_dump($_SESSION);
    }

    public function chats()
    {
        $this->id = $this->sessionController->get("id");
        $userChats = $this->userDetailsRepository->getChats($this->id);
        $this->render('chats', ['userChats' => $userChats]);
    }


    public function chat()
    {
        $chat_id = $_GET['chat_id'];
        $this->id = $this->sessionController->get("id");
        $userChatInfo = $this->userDetailsRepository->getChatInfo($this->id, $chat_id);
        $this->render('chat', ['userChatInfo' => $userChatInfo]);
    }

}