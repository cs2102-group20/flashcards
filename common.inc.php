<?php

require_once 'config.inc.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);
if ($mysqli->connect_errno) {
    echo "DB error: " . $mysqli->connect_error;
    exit(1);
}

function check_login($user, $pass) {
    if ($stmt = $mysqli->prepare(
        "SELECT id, username, is_admin FROM users WHERE username = ? AND password = ?")) {

        $stmt->bind_param("ss", $user, $pass);
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

if (isset($_POST['login'])) {
    if (check_login($_POST['user'], $_POST['pass'])) {
        setcookie('user', $_POST['user']);
        setcookie('pass', $_POST['pass']);
    }
} elseif (isset($_COOKIE['user'])) {
    check_login($_COOKIE['user'], $_COOKIE['pass']);
} else {
    define('USER_IS_LOGGED_IN', false);
}
