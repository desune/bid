<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
include_once 'Application/models/auction.php';
include_once 'Application/models/item.php';
$auc=new auction();
$it=new item();


$userID=$_SESSION['userID'];

$it->setUserID($userID);

	if(isset($_POST['auctioncontrol'])) 
	{
		$aucIDList=$_POST['aucIDList'];
		for($i=0; $i < count($aucIDList); $i++)
    	{
    		$au=new auction();
      		$au->setAuctionID($aucIDList[$i]);
      		$au->setAllow(1);
      		$au->update($mysqli,$db_name);
      		
      		$itemlist=$it->getListUncheck($mysqli,$db_name);

			include_once 'Application/views/auctioncontrol.php';
    	
    	}
	}
	else
	{
	$itemlist=$it->getListUncheck($mysqli,$db_name);

	include_once 'Application/views/auctioncontrol.php';
	}
?>