<?php

$root = $_SERVER['DOCUMENT_ROOT'];

session_start();

require_once $root . '/facebook/helper/helper_functions.php';

is_auth_user(false, true);

require_once $root . '/facebook/database/Database.php';
require_once $root . '/facebook/app/Post.php';

// POST REQUEST ACTIONS
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $post = new Post([
        'title' => $_POST['title'] ?: 'Default -',
        'content' => $_POST['content'] ?: 'Default -',
        'user_id' => $_SESSION['user']['id']
    ]);
}

return header('location:/facebook/index.php');