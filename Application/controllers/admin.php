<?php
include_once 'Application/models/users.php';
	$isadmin=new users();
	$isadmin->setUserID($_SESSION['userID']);
	//print $_SESSION['userID'];
	$isadmin=$isadmin->getUser($mysqli,$db_name);
	
	if ($isadmin->getAdmin()==1)
	{
		include_once 'Application/views/admin.php';
	}
?>