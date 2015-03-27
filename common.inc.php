<?php

require_once 'config.inc.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);
if ($mysqli->connect_errno) {
    echo "DB error: " . $mysqli->connect_error;
    exit(1);
}
if (!$mysqli->set_charset('utf8')) {
    echo "Unable to set charset.";
    exit(1);
}

function check_login($mysqli, $user, $hash) {
    if ($stmt = $mysqli->prepare(
        'SELECT id, username, is_admin FROM users WHERE username = ? AND password = ?')) {

        $stmt->bind_param("ss", $user, $hash);
        $stmt->execute();
        $stmt->bind_result($user_id, $user_name, $user_is_admin);

        if ($stmt->fetch()) {
            define('USER_ID', $user_id);
            define('USER_NAME', $user_name); // gets correct capitalization from DB
            define('USER_IS_ADMIN', $user_is_admin);
            define('USER_IS_LOGGED_IN', true);
            return true;
        } else {
            define('USER_IS_LOGGED_IN', false);
            return false;
        }
    } else {
        echo "Unable to fetch users.";
        exit(1);
    }

}

function get_languages($mysqli) {
    if ($result = $mysqli->query('SELECT id, name FROM languages')) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Unable to fetch languages.";
        exit(1);
    }

}

if (isset($_POST['login'])) {
    $hash = hash('sha256', $_POST['pass']);
    if (check_login($mysqli, $_POST['user'], $hash)) {
        setcookie('user', $_POST['user']);
        setcookie('hash', $hash);
    }
} elseif (isset($_POST['logout'])) {
    setcookie('user', '', time() - 86400);
    setcookie('hash', '', time() - 86400);
    define('USER_IS_LOGGED_IN', false);
} elseif (isset($_COOKIE['user'])) {
    check_login($mysqli, $_COOKIE['user'], $_COOKIE['hash']);
} else {
    define('USER_IS_LOGGED_IN', false);
}
