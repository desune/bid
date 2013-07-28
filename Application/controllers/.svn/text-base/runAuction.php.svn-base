<?php
	include_once 'Application/models/auction.php';
	include_once 'Application/models/item.php';
	$auc=new auction();
	$it=new item();
	if (date('H')=="00")
	{
		$date=date('Y-m-'.(date('d')-1).' '.'23'.':i:s');
	}
	else
	$date=date('Y-m-d '.(date('H')-1).':i:s');
	
	$userID=$_SESSION['userID'];

	$it->setUserID($userID);
	$itemID=$_GET['item'];
	$auctionID=$_GET['auction'];

	

	
	$it->setItemID($itemID);

	$startdate=$_POST['startdate'];
	


	if(isset($_POST['runAuction'])) 
	{
	unset($_POST['runAuction']);
	//print "itemedited";
	//print "input :".$userID;
	//print "pass	 :".$passwd;
	$error="Co loi xay ra";
	$errorNum=0;

	$auccheck=new auction();
	$auccheck->setAuctionID($auctionID);
	$auccheck=$auccheck->getAuction($mysqli,$db_name);
	if ($auccheck->getStarted()==1)
	{
		$error=$error."Bạn không thể thực hiện 1 phiên đấu giá 2 lần !!";
		$errorNum++;
	}
	if (strlen($starttime)!=0)
	{
			$auc->setStartdate($starttime);
		
	}
	else
	{
		$auc->setStartdate($date);
	}



	

	
	$chck=new item();
	$chck->setItemID($itemID);
	$chck->setUserID($userID);
	if(!($chck->checkOwner($mysqli,$db_name)))
		{
		$error=$error."Ban khong phai chu so huu item nay!!";
		$errorNum++;	
		}
	
	if ($errorNum==0)
		{
		//print ("error=0");	
			//$us->update($mysqli,$db_name);
		$auc->setAuctionID($auctionID);
	//	$auc->setEnddate($enddate);
		$auc->update($mysqli,$db_name);
		$auc->setEnddate("init");
		$auc->setStarted("1");
		//$auc->setStarted("1");
		$auc->update($mysqli,$db_name);
	
	//	unset($_SESSION['userID']);	
		unset($_POST['type']);
		unset($_POST['minprice']);

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
		header("Location:index.php?control=auction");
		}
	
	else 
		{
		print  $error."!!!<BR>";
		header("Location:index.php?control=auction");
		
		}
		/*
	*/
	
	}
		
	else
	{	
		//print 'Application/views/useredit.php'." !!!<BR>";
		include_once 'Application/views/runAuction.php';
	}
	
	
?>