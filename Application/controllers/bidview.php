<?php
include_once 'Application/models/auction.php';
include_once 'Application/models/item.php';
$auc=new auction();
$it=new item();



if(isset($_POST['bidview']))
{	
	$itemType=$_POST['itemTypeID'];

	$auc->setItemTypeID($itemType);
	$aucrunninglist=$auc->getAuctionRunningByItemType($mysqli,$db_name);
	unset ($_POST['itemTypeID']);
	include_once 'Application/views/bidview.php';
}else{
	include_once 'Application/views/bidview.php';
}

?>