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
$error="";
$errorNum=0;
$auccheck->setAuctionID($auctionID);
	$auccheck=$auccheck->getAuction($mysqli,$db_name);
	if ($auccheck->getStarted()==1)
	{
		$error=$error."Bạn không thể xóa phiên đấu giá này vì nó đã được thực hiện!!";
		$errorNum++;
	}
//print $itemID.$auctionID
$it->setItemID((string)$itemID);
	
if (!($it->checkOwner($mysqli,$db_name)))
{
	//print "owner";
$error=$error."Bạn không phải chủ sở hữu của item này!!";
		$errorNum++;

	
}

if ($errorNum==0)
{
		$auc->setAuctionID($auctionID);
	$auc->setItemID($itemID);
	$auc->delete($mysqli,$db_name);
	
}
else
{
	//print $error;
}

//$auc->set
//$members=$us->getListUndelete($mysqli,$db_name);


//include_once 'Application/views/members.php';
?>