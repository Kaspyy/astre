<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../controllers/UserInfoController.php';

class SecurityController extends AppController
{
    private $userRepository;
    private $userInfoController;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->userInfoController = new UserInfoController();
        session_start();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }
        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist']]);
        }
        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages'=>['Wrong password!']]);
        }

        $_SESSION['id'] = $user->getId();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/swipe");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['re_password'];

        if ($password !== $confirmPassword) {
            return $this->render('login', ['messages' => ['Please provide proper password']]);
        }
        if ($name == null) {
            return $this->render('login', ['messages' => ['Name field cannot be empty']]);
        }

        //TODO try to use better hash function
        $user = new User($email, md5($password), uniqid());
        $userDetails = new UserDetails($name, $birthday);

        $this->userRepository->addUser($user, $userDetails);

        $_SESSION['id'] = $user->getId();

        $this->render($this->login());
    }
}