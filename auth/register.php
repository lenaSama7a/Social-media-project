<?php

$root = $_SERVER['DOCUMENT_ROOT'];

session_start();

require_once $root . '/facebook/helper/helper_functions.php';

is_auth_user(true);

require_once $root . '/facebook/database/Database.php';
require_once $root . '/facebook/app/User.php';

$userHelper = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // VALIDATION #1
    $all_required = array_filter([$name, $email, $username, $password]);
    // VALIDATION #2
    $isEmailNotUnique = $userHelper->getUserByKeyColumn('email', $email);
    // VALIDATION #3
    $isUsernameNotUnique = $userHelper->getUserByKeyColumn('username', $username);
    // VALIDATION #4
    $isPasswordMoreThanFive = (strlen($password) > 5);

    $allIsFine = true;

    if (sizeof($all_required) < 4) {
        // #1
        $allIsFine = false;
        $_SESSION['validation_err'][] = "All Fileds Are Required!";
    }
    if ($email && $isEmailNotUnique) {
        // #2
        $allIsFine = false;
        $_SESSION['validation_err'][] = "The Email Should Be Unique!";
    }
    if ($username && $isUsernameNotUnique) {
        // #3
        $allIsFine = false;
        $_SESSION['validation_err'][] = "The Username Should Be Unique!";
    }
    if ($password && !$isPasswordMoreThanFive) {
        // #4
        $allIsFine = false;
        $_SESSION['validation_err'][] = "The Password Should Be More Than 5 Char.!";
    }

    if($allIsFine) {
        $user = new User([
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);
        save_new_user_in_session($user);
        return header('location:/facebook/index.php');
    }
}

return header('location:/facebook/register.php');
