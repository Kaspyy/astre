<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login', ['message'=>"Hello World!"]);
    }

    public function swipe()
    {
        $this->render('swipe');
    }
    public function chat()
    {
        $this->render('chat');
    }
    public function select_gender()
    {
        $this->render('select_gender');
    }
    public function interested_in()
    {
        $this->render('interested_in');
    }
    public function select_hobbies()
    {
        $this->render('select_hobbies');
    }
}