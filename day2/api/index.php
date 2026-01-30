<?php

$path = explode('/', explode('/phpractice/day2/api/', $_SERVER['REQUEST_URI'])[1]);

header('Content-Type: application/json');

switch($path[0]){
    case 'login':
        echo '{"status": "success", "message": "Logged in successfully"}';
        break;
}
