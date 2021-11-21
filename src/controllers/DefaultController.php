<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function swipe()
    {
        $this->render('swipe');
    }

    public function chats()
    {
        $this->render('chats');
    }
    public function profile()
    {
        $this->render('profile');
    }
    public function chat()
    {
        $this->render('chat');
    }
    // public function astre()
    // {
    //     $this->render('astre');
    // }
    public function settings()
    {
        $this->render('settings');
    }
    public function edit_profile()
    {
        $this->render('edit_profile');
    }
}