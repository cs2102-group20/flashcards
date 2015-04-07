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

function get_set($mysqli, $set) {
    if ($stmt = $mysqli->prepare(
        'SELECT s.id, s.title, s.description, l1.id AS l1_id, l1.name AS l1_name, l2.id AS l2_id, l2.name AS l2_name, u.username, u.id AS u_id '
        . 'FROM card_sets s, languages l1, languages l2, users u '
        . 'WHERE s.user_id = u.id AND s.language1_id = l1.id AND s.language2_id = l2.id AND s.id = ?')) {

        $stmt->bind_param("i", $set);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0];
    } else {
        echo "Unable to fetch set.";
        exit(1);
    }

}

function get_cards($mysqli, $set) {
    if ($stmt = $mysqli->prepare('SELECT word1, word2 FROM cards WHERE set_id = ?')) {
        $stmt->bind_param("i", $set);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Unable to fetch cards.";
        exit(1);
    }

}

function has_favorited($mysqli, $set) {
    if ($stmt = $mysqli->prepare('SELECT 1 FROM favorites WHERE user_id = ' . USER_ID . ' AND set_id = ?')) {
        $stmt->bind_param("i", $set);
        $stmt->execute();
        return count($stmt->get_result()->fetch_all()) > 0;
    } else {
        echo "Unable to fetch favorites.";
        exit(1);
    }

}

function insert_favorite($mysqli, $set) {
    if ($stmt = $mysqli->prepare('INSERT INTO favorites VALUES (' . USER_ID . ', ?)')) {
        $stmt->bind_param("i", $set);
        $stmt->execute();
    } else {
        echo "Unable to add favorite.";
        exit(1);
    }

}

function remove_favorite($mysqli, $set) {
    if ($stmt = $mysqli->prepare('DELETE FROM favorites WHERE user_id = ' . USER_ID . ' AND set_id = ?')) {
        $stmt->bind_param("i", $set);
        $stmt->execute();
    } else {
        echo "Unable to add favorite.";
        exit(1);
    }

}

function insert_users($mysqli, $username, $hash, $isAdmin){
	$sql = "INSERT INTO users (username, password, is_admin) VALUES ('" . $username . "', '" . $hash . "', " . $isAdmin . ");";
	if ($mysqli->query($sql) === TRUE) {
		header("location: regform_success");
	} else {
		if($mysqli->errno == 1062){
			header("location: regform_userExist");
		}else{
		/*
			echo "Error: " . $sql . "<br>" . $mysqli->error;
			echo "<br /><br />";
			echo "<a href='register.php'>Please try registering again.</a>";
			*/
			//not expect to occur...
			header("location: regform_unexpected");
			}
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
