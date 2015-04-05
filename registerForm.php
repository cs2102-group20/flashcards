<?php
require_once 'common.inc.php';
//server side checking just in case JavaScript is disabled.


//insert data if ok

insert_users($mysqli, $_POST['username'], hash('sha256',$_POST['pw']), false); 
