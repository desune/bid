<?php
	if(isset($_POST['login'])) {
			// neu ma capccha trung
	include_once 'Application/models/users.php';
	$us=new users();
	$checkdelete=new users();
	$userID=$_POST['userID'];
	$passwd=$_POST['passwd'];
	
	$us->setUserID($userID);
	$us->setPasswd($passwd);
	$error="";
	$success="";
	
	if($us->checkLogin($mysqli,$db_name))
	{
		
		$get=$us->getUser($mysqli,$db_name);
		unset($_POST['login']);
		unset($_POST['userID']);
		unset($_POST['passwd']);
		if ($get->getDelete()==0)
		{
		$_SESSION['userID']=$get->getUserID();
		$_SESSION['userName']=$get->getName();
		$_SESSION['admin']=$get->getAdmin();
		}
		
		else 
		{
		$error=$error."Tai khoan cua ban da bi khoa boi nguoi quan tri";
		include_once 'Application/views/login.php';
		
		}
		include_once 'Application/views/home.php';
	}
	else 
	{
		$error=$error."Dang nhap sai thong tin !!!<BR>";
		include_once 'Application/views/login.php';
		
	}
	}		
	else
	{	
	//	print "Dang nhap sai !!!<BR>";
		include_once 'Application/views/login.php';
	}
	
	
?>