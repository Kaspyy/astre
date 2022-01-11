<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('edit_profile', 'UserInfoController');
Router::get('settings', 'UserInfoController');
Router::get('swipe', 'DefaultController');
Router::get('chats','ChatsController');
Router::get('profile', 'UserInfoController');
Router::get('chat', 'ChatsController');
Router::get('select_gender', 'UserInfoController');
Router::get('interested_in', 'UserInfoController');
Router::get('select_hobbies','DefaultController');
Router::post('login', 'SecurityController');
Router::post('sendMessage', 'ChatsController');
Router::post('register', 'SecurityController');
Router::post('uploadPhoto', 'UserInfoController');
Router::post('updateUserDetails', 'UserInfoController');
Router::post('updateUserBio', 'UserInfoController');
Router::post('updateUserGender', 'UserInfoController');
Router::post('updateUserInterest', 'UserInfoController');
Router::get('logout', 'SecurityController');

Router::run($path);