<?php
	$itemID=$_GET['value'];
	//print "Item ID =".$itemID;
			
	//print 'useredited!!';
			
	
	
	include_once 'Application/models/item.php';
	include_once 'Application/models/users.php';
	$isadmin=new users();
	$isadmin->setUserID($_SESSION['userID']);
	$isadmin=$isadmin->getUser($mysqli,$db_name);
	if ($isadmin->getAdmin()==1)
	{
	
	//print 'iss admin';
	$it=new item();
	
	$it->setItemID($itemID);
	$it=$it->getItem($mysqli,$db_name);
	
	if(isset($_POST['itemedit'])) 
	{
	unset($_POST['itemedit']);
	//print "itemedited";
	//print "input :".$userID;
	//print "pass	 :".$passwd;
	$error="";
	$errorNum=0;
	$change=new item();
	$change->setItemID($itemID);
	
	$newpasswd=$_POST['newpasswd'];
	$renewpasswd=$_POST['renewpasswd'];
	$passwd=$_POST['passwd'];
	$photo=$_POST['photo'];
	$detail=$_POST['detail'];
	$itemTypeID=$_POST['itemTypeID'];
	
	if (strlen($renewpasswd)!=0)
	{
		if(strcmp($newpasswd,$renewpasswd)!=0)
		{
		$error=$error."confirm newpass != passwd!!";
		$errorNum++;	
		}
		else
		$change->setPasswd($newpasswd);
	}
	if (strlen($photo)!=0)
	{	//print strlen($hoto);
		$change->setPhoto($photo);
	}
	if (strlen($detail)!=0)
	{
		$change->setDetail($detail);
	}
	if (strlen($itemTypeID)!=0)
	{
		$change->setItemTypeID($itemTypeID);
	}
	
	
	if ($errorNum==0)
		{
		//print ("error=0");	
			//$us->update($mysqli,$db_name);
		$change->update($mysqli,$db_name);
	//	unset($_SESSION['userID']);	
		unset($_POST['newpasswd']);
		unset($_POST['renewpasswd']);
		unset($_POST['passwd']);
		unset($_POST['photo']);
		unset($_POST['detail']);
		unset($_POST['itemTypeID']);
	//	unset($_POST['birthday']);	

//		unset($_POST['newpasswd']);
	//	unset($_POST('renewpasswd'));
		//unset($_POST['passwd']);
 		//unset($_POST['repasswd']);
		//unset($_POST['name']);
		//unset($_POST['sex']);
		//unset($_POST['email']);
		//unset($_POST['birthday']);
		//unset($_POST['phone']);
	 include_once 'Application/views/home.php';
		}
	
	else 
		{
		//print  $error."!!!<BR>";
		include_once 'Application/views/itemedit.php';
		
		}
		/*
	*/
	
	}
		
	else
	{	
		//print 'Application/views/useredit.php'." !!!<BR>";
		include_once 'Application/views/itemedit.php';
	}
	}
	else
	{
	
	$it=new item();
	
	$it->setItemID($itemID);
	$it=$it->getItem($mysqli,$db_name);
	
	if(isset($_POST['itemedit'])) 
	{
	unset($_POST['itemedit']);
	//print "itemedited";
	//print "input :".$userID;
	//print "pass	 :".$passwd;
	$error="";
	$errorNum=0;
	$change=new item();
	$change->setItemID($itemID);
	
	$newpasswd=$_POST['newpasswd'];
	$renewpasswd=$_POST['renewpasswd'];
	$passwd=$_POST['passwd'];
	$photo=$_POST['photo'];
	$detail=$_POST['detail'];
	$itemTypeID=$_POST['itemTypeID'];
	$auc=new auction();
	$auc->setItemID($itemID);
	if ($auc->getIssetAuctionByItemID($mysqli,$db_name))
	{
		$error=$error."Bạn không thể chỉnh sửa thông tin item khi đã đăng đấu giá,để chỉnh sửa bạn cần gỡ item này xuống";
		$errorNum++;	
	}
	if (strlen($renewpasswd)!=0)
	{
		if(strcmp($newpasswd,$renewpasswd)!=0)
		{
		$error=$error."confirm newpass != passwd!!";
		$errorNum++;	
		}
		else
		$change->setPasswd($newpasswd);
	}
	if (strlen($photo)!=0)
	{	//print strlen($hoto);
		$change->setPhoto($photo);
	}
	if (strlen($detail)!=0)
	{
		$change->setDetail($detail);
	}
	if (strlen($itemTypeID)!=0)
	{
		$change->setItemTypeID($itemTypeID);
	}
	

	$chck=new item();
	$chck->setItemID($itemID);
	$chck->setPasswd($passwd);
	if(!($chck->checkLogin($mysqli,$db_name)))
		{
		$error=$error."Nhap sai passwd!!";
		$errorNum++;	
		}
	
	if ($errorNum==0)
		{
		//print ("error=0");	
			//$us->update($mysqli,$db_name);
		$change->update($mysqli,$db_name);
	//	unset($_SESSION['userID']);	
		unset($_POST['newpasswd']);
		unset($_POST['renewpasswd']);
		unset($_POST['passwd']);
		unset($_POST['photo']);
		unset($_POST['detail']);
		unset($_POST['itemTypeID']);
	//	unset($_POST['birthday']);	

//		unset($_POST['newpasswd']);
	//	unset($_POST('renewpasswd'));
		//unset($_POST['passwd']);
 		//unset($_POST['repasswd']);
		//unset($_POST['name']);
		//unset($_POST['sex']);
		//unset($_POST['email']);
		//unset($_POST['birthday']);
		//unset($_POST['phone']);
	 include_once 'Application/views/home.php';
		}
	
	else 
		{
		//print  $error."!!!<BR>";
		include_once 'Application/views/itemedit.php';
		
		}
		/*
	*/
	
	}
		
	else
	{	
		//print 'Application/views/useredit.php'." !!!<BR>";
		include_once 'Application/views/itemedit.php';
	}
	}
	
?>