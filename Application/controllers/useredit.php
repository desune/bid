<?php
	if(isset($_POST['useredit'])) 
	{
			
	unset($_POST['useredit']);
	
	include_once 'Application/models/users.php';
	
	$userID=$_SESSION['userID'];	
	$newpasswd=$_POST['newpasswd'];
	$renewpasswd=$_POST['renewpasswd'];
	$passwd=$_POST['passwd'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$birthday=$_POST['birthday'];
	//print "input :".$userID;
	//print "pass	 :".$passwd;
	$error1="";
	$error2="";
	$success="";
	$errorNum=0;
	$us=new users();
	$us->setUserID($userID);
	if (strlen($renewpasswd)!=0)
	{
		if(strcmp($newpasswd,$renewpasswd)!=0)
		{
		$error1=$error1."confirm newpass khong dung";
		$errorNum++;	
		}
		else
		$us->setPasswd($newpasswd);
	}
	if (strlen($name)!=0)
	{	//print strlen($name);
		$us->setName($name);
	}
	if (strlen($email)!=0)
	{
		$us->setEmail($email);
	}
	if (strlen($phone)!=0)
	{
		$us->setPhone($phone);
	}
	if (strlen($birthday)!=0)
	{
		$us->setBirthday($birthday);
	}
	if (strlen($sex)!=0)
	{
		$us->setSex($sex);
	}
	$chck=new users();
	$chck->setUserID($userID);
	$chck->setPasswd($passwd);
	if(!($chck->checkLogin($mysqli,$db_name)))
		{
		$error2=$error2."Ban nhap sai pasword";
		$errorNum++;	
		}
	if ($errorNum==0)
		{
	    $success=$success."Ban thay doi thong tin thanh cong";
		$us->update($mysqli,$db_name);
		//unset($_SESSION['userID']);	
		unset($_POST['newpasswd']);
		unset($_POST['renewpasswd']);
		unset($_POST['passwd']);
		unset($_POST['name']);
		unset($_POST['email']);
		unset($_POST['phone']);
		unset($_POST['birthday']);	
	 include_once 'Application/views/useredit.php';
		}
	else 
		{
		//print  $error."!!!<BR>";
		include_once 'Application/views/useredit.php';
		}
		/*
	*/
	}
	else
	{	
		//print 'Application/views/useredit.php'." !!!<BR>";
		include_once 'Application/views/useredit.php';
	}
?>