<?php

function login($username, $password)
{
    $user = (new User())->getUserByKeyColumn('username', $username);

    if ($user && md5($password) == $user->password) {
        return $user;
    }

    return false;
}

function from_snack_to_camel_case($name)
{
    $convertedName = '';

    foreach (explode('_', $name) as $index => $value) {
        if (!$index) {
            $convertedName .= $value;
        } else {
            $convertedName .= ucwords($value);
        }
    }

    return $convertedName;
}

function is_auth_user($redirect_to_index = false, $redirect_to_login = false)
{
    // auth. => authenticated
    if (array_key_exists('user', $_SESSION) && $_SESSION['user']) {
        if($redirect_to_index) {
            return header('location:/facebook/index.php');
        }

        return true;
    } else {
        if($redirect_to_login) {
            return header('location:/facebook/login.php');
        }

        return false;
    }
}

function save_new_user_in_session(User $user)
{
    $_SESSION['user']['id'] = $user->id;
    $_SESSION['user']['email'] = $user->email;
    $_SESSION['user']['username'] = $user->username;

    return true;
}

// $data = ['name'=>'xyz', 'age'=>23', 'country' => 'KWT']
// get_data_from($data, 'country')
// ''

function get_data_from(array $data, $key, $default = '') 
{
    if(array_key_exists($key, $data)) {
        return $data[$key];
    }

    return $default;
}