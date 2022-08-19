<?php

$root = $_SERVER['DOCUMENT_ROOT'];

session_start();

require_once $root . '/facebook/helper/helper_functions.php';

is_auth_user(true);

require_once $root . '/facebook/database/Database.php';
require_once $root . '/facebook/app/User.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username && $password && ($user = login($username, $password))) {
        save_new_user_in_session($user);
        return header('location:/facebook/index.php');
    }
}

return header('location:/facebook/login.php');