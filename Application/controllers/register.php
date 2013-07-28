<?php
	if(isset($_POST['register'])) {
			// neu ma capccha trung
	include_once 'Application/models/users.php';
	
	$userID=$_POST['userID'];
	$passwd=$_POST['passwd'];
	$repasswd=$_POST['repasswd'];
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$birthday=$_POST['birthday'];
	//print "input :".$userID;
	//print "pass	 :".$passwd;
	$error1="";
	$error2="";
	$error3="";
	$error4="";
	$error5="";
	$error6="";
	$error7="";
	$error8="";
	$success="";
	$errorNum=0;
	if ((!isset($userID))||(strlen($userID)<6)) 
	{
		$error1=$error1."Phai nhap vao ten dang nhap nhieu hon 6 ky tu!!";
			$errorNum++;
	}
	if ((!isset($passwd))||(strlen($passwd)<6)) 
	{
		$error2=$error2."Passwd nhap vao phai nhieu hon 6 ky tu!!";
			$errorNum++;
	}
	if ((!isset($repasswd))||(strlen($repasswd)==0)) 
	{
		$error3=$error3."Chua nhap vao confirm passwd!!";
		$errorNum++;
	}
	if ((!isset($name))||(strlen($name)==0)) 
	{
		$error4=$error4."Chua nhap vao ten!!";
		$errorNum++;
	}
	if (!isset($sex))
	{
	
		$errorNum++;
	}
	if ((!isset($email))||(strlen($email)==0)) 
	{
		$error6=$error6."Chua nhap vao email!!";
		$errorNum++;
	}
	if ((!isset($phone))||(strlen($phone)==0)) 
	{
		$error7=$error7."Chua nhap vao sdt!!";
		$errorNum++;
	}
	if ((!isset($birthday))||(strlen($birthday)==0)) 
	{
		$error8=$error8."Chua nhap vao ngay sinh!!";
		$errorNum++;
	}
	if(strcmp($passwd,$repasswd)!=0)
		{
		$error3=$error3."Passwd nhac lai khong trung voi passwd!!";
		$errorNum++;	
		}
	$chck=new users();
	$chck->setUserID($userID);
	if($chck->isUser($mysqli,$db_name))
		{
		$error1=$error1."Userr tren da ton tai!!";
		$errorNum++;	
		}
	if ($errorNum==0)
	{ $success=$success."Bạn đã đăng kí thành công";
		$us=new users();
		$us->setUserID($userID);
		$us->setPasswd($passwd);
		$us->setName($name);
		$us->setSex($sex);
		$us->setEmail($email);
		$us->setBirthday($birthday);
		$us->setPhone($phone);
	 	$us->add($mysqli,$db_name);
		unset($_POST['userID']);
		unset($_POST['passwd']);
 		unset($_POST['repasswd']);
		unset($_POST['name']);
		unset($_POST['sex']);
		unset($_POST['email']);
		unset($_POST['birthday']);
		unset($_POST['phone']);
	 	//print $us->getUserID();
	
	 	//print $us->getPasswd();
		/*if($us->checkLogin($mysqli,$db_name))
		{
		//print "Loginsuccess!!";
			$get=$us->getUser($mysqli,$db_name);
			$_SESSION['userID']=$get->getUserID();
			$_SESSION['userName']=$get->getName();
		//print "userNameis".$_SESSION['userName'];
	//	unset($_POST['login']);	
		//header("index.php");
			unset($_POST['register']);
			include_once 'Application/views/home.php';
		}*/
		include_once 'Application/views/register.php';
	}
	else 
	{
		//print  $error."!!!<BR>";
		include_once 'Application/views/register.php';
		
	}
	}		
	else
	{	
	//	print "Dang nhap sai !!!<BR>";
		include_once 'Application/views/register.php';
	}
	
	
?>