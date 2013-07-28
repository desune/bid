<?php
include_once 'Application/models/auction.php';
include_once 'Application/models/item.php';
include_once 'Application/models/users.php';
include_once 'Application/models/bid.php';
$auc=new auction();
$it=new item();
$us=new users();
$b=new bid();

$auclistend=$auc->getAuctionEnd($mysqli,$db_name);

include_once 'Application/views/bidend.php';

?>