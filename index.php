<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('astre', 'DefaultController');
Router::get('settings', 'DefaultController');
Router::get('edit_profile', 'DefaultController');

Router::run($path);