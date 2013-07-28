<?php

if(isset($_GET['value']))
{
	$usID = $_GET['value'];

	include_once 'Application/models/users.php';

$us=new users();
$us->setUserID($usID);
//print "select ".$us->getUserID();
$result=$us->getUser($mysqli,$db_name);

//print "Success: ".$result->getName();
include_once 'Application/views/user.php';
	
}
else{
	header("index.php");
}


?>