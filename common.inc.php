<?php

require_once 'config.inc.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);
if ($mysqli->connect_errno) {
    echo "DB error: " . $mysqli->connect_error;
    exit(1);
}

if (isset($_COOKIE['user'])) {
    if ($stmt = $mysqli->prepare(
        "SELECT id, username, is_admin FROM users WHERE username = ?")) {

        $stmt->bind_param("s", $_COOKIE['user']);
        $stmt->execute();
        $stmt->bind_result($user_id, $user_name, $user_is_admin);

        if ($stmt->fetch()) {
            define('USER_ID', $user_id);
            define('USER_NAME', $user_name);
            define('USER_IS_ADMIN', $user_is_admin);
            define('USER_IS_LOGGED_IN', true);
        } else {
            define('USER_IS_LOGGED_IN', false);
        }
    } else {
        echo "Unable to fetch users.";
        exit(1);
    }
} else {
    define('USER_IS_LOGGED_IN', false);
}
