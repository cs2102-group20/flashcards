<?php
require_once 'common.inc.php';
//server side checking just in case JavaScript is disabled.


//insert data if ok
$sql = "INSERT INTO users (username, password, is_admin) VALUES ('Smith', '12345678Ffhdk', false);";
if ($mysqli->query($sql) === TRUE) {
	echo "New account created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
}

