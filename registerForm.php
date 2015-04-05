<?php
require_once 'common.inc.php';
//server side checking just in case JavaScript is disabled.


//insert data if ok
if(isset($_POST['username'])){
	$sql="SELECT * FROM users WHERE username='" . $username . "';";
	$mysql_get_users = $mysqli->query($sql);
	$get_rows = mysql_affected_rows($mysqli);

	if($get_rows >=1){
	echo "user exists";
	//die();
	}

	else{
	echo "user do not exists";
	insert_users($mysqli, $_POST['username'], hash('sha256',$_POST['pw']), 'false'); 
	}
}

