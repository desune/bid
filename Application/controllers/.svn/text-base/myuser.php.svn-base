<?php
if(isset($_GET['value']))
{
	$usID = $_GET['value'];
	include_once 'Application/models/users.php';

	$us=new users();
	$us->setUserID($usID);
	
	$result=$us->getUser($mysqli,$db_name);
	include_once 'Application/views/myuser.php';
}else{
	header("index.php");
}
?>