<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
	include_once 'Application/models/auction.php';
include_once 'Application/models/item.php';
$auc=new auction();
$it=new item();
$auccheck=new auction();

$userID=$_SESSION['userID'];

$it->setUserID($userID);
$itemID=$_GET['item'];
$auctionID=$_GET['auction'];
$auc->setAuctionID($auctionID);
	$aucview=$auc->getAuction($mysqli,$db_name);
	
	$it->setItemID($itemID);

	$type=$_POST['type'];
	$minprice=$_POST['minprice'];


	if(isset($_POST['editAuction'])) 
	{
	unset($_POST['editAuction']);
	$error="";
	$errorNum=0;

	$auccheck->setAuctionID($auctionID);
	$auccheck=$auccheck->getAuction($mysqli,$db_name);
	if ($auccheck->getStarted()==1)
	{
		$error=$error."Bạn không thể sửa thông tin khi phiên đấu giá đã bắt đầu !!";
		$errorNum++;
	}
	            if ($auccheck->getAllow()==1)
            {
                        $error=$error."Bạn không thể sửa thông tin khi phiên đấu giá đã được admin thông qua !!";
                        $errorNum++;
            }
	if (strlen($type)!=0)
	{
			$auc->setType($type);
		
	}
	if (strlen($minprice)!=0)
	{	//print strlen($hoto);
	
		$auc->setMinprice($minprice);
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
		//print  $error."!!!<BR>";
		include_once 'Application/views/editAuction.php';
		
		}
		/*
	*/
	
	}
		
	else
	{	
		//print 'Application/views/useredit.php'." !!!<BR>";
		include_once 'Application/views/editAuction.php';
	}
	
	
?>