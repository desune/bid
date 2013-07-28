<?php
	if(isset($_POST['adminedit'])) 
	{
			
	//print 'useredited!!';
			
	unset($_POST['adminedit']);
	
	include_once 'Application/models/users.php'; 
	$userID=$_GET['userID'];	
	$newpasswd=$_POST['newpasswd'];
	$renewpasswd=$_POST['renewpasswd'];
	$admin=$_POST['admin'];
	$sex=$_POST['sex'];
	$delete=$_POST['delete'];
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
		$error1=error1."confilm password khác với password";
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
		if (strlen($delete)!=0)
	{
		
		$checkdelete=new users();
		$checkdelete->setUserID($userID);
		$checkdelete=$checkdelete->getUser($mysqli,$db_name);
		if ($checkdelete->getDelete()==1)
		$us->setDelete(0);
		else
		$us->setDelete($delete);
	}
		if (strlen($admin)!=0)
	{
		$us->setAdmin($admin);
	}
	$ad=$_SESSION['userID'];
	$chck=new users();
	$chck->setUserID($ad);
	$chck->setPasswd($passwd);
	if(!($chck->checkLogin($mysqli,$db_name)))
		{
		$error2=$error2."Nhập sai admin passwd";
		$errorNum++;	
		}
	
	if ($errorNum==0)
		{
			$success.$success="Bạn đã thay đổi thông tin thành công";
		//print "USID:".$us->getUserID().$us->getBirthday();
		$us->update($mysqli,$db_name);
		//unset($_SESSION['userID']);	
		unset($_POST['newpasswd']);
		unset($_POST['renewpasswd']);
		unset($_POST['passwd']);
		unset($_POST['name']);
		unset($_POST['email']);
		unset($_POST['phone']);
		unset($_POST['birthday']);	
		unset($_POST['admin']);
		unset($_POST['sex']);
		unset($_POST['delete']);
//		unset($_POST['newpasswd']);
	//	unset($_POST('renewpasswd'));
		//unset($_POST['passwd']);
 		//unset($_POST['repasswd']);
		//unset($_POST['name']);
		//unset($_POST['sex']);
		//unset($_POST['email']);
		//unset($_POST['birthday']);
		//unset($_POST['phone']);
		

	 include_once 'Application/views/adminedit.php';
		}
	
	else 
		{
	
		include_once 'Application/views/adminedit.php';
		
		}
		/*
	*/
	
	}
		
	else
	{	   
		//print 'Application/views/useredit.php'." !!!<BR>";
		include_once 'Application/views/adminedit.php';
	}
	
	
?>