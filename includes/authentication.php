<?php
/**
 * 
 * Management of the authentication process
 * 
 */

function authentication($username, $password) {
    $username = $username;
    $password = trim($password);

    $user = authenticate($username, $password);

    if($user == null) {
        $_SESSION['alert']['warning'] = "Incorrect username or password provided".
        header("Location: login.php");
        exit();
    }

    return $user;
}

function authenticate($username, $password) {
    if(empty($username) || empty($password)) {
        return null;
    }

    $user = get_user_by('username', $username);

    if(!$user) {
        return null;
    }

    if(!check_password($password, $user->password)) {
        return null;
    }

    return $user;
}

function get_user_by($type, $value) {
    $data = user::get_data_by($type, $value);

    if(!$data) {
        return false;
    }

    $user = new user;
    $user->init($data);

    return $user;
}

function check_password($password, $hash, $user_id) {
    $match = compare_hash($hash, md5($password));

    return $match;
}

function compare_hash($hash1, $hash2) {
    if(empty($hash1) || empty($hash2)) {
        return false;
    }

    if($hash1 === $hash2) {
        return true;
    } else {
        return false;
    }
}