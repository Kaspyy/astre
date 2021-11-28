<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('settings', 'DefaultController');
Router::get('edit_profile', 'DefaultController');
Router::get('swipe', 'DefaultController');
Router::get('chats','DefaultController');
Router::get('profile', 'DefaultController');
Router::get('chat', 'DefaultController');
Router::get('select_gender', 'DefaultController');
Router::get('interested_in', 'DefaultController');
Router::get('select_hobbies','DefaultController');
Router::post('login', 'SecurityController');
Router::post('uploadPhoto', 'PhotoController');

Router::run($path);