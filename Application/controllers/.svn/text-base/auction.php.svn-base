<?php
include_once 'Application/models/auction.php';
include_once 'Application/models/item.php';
$auc=new auction();
$it=new item();


$userID=$_SESSION['userID'];

$it->setUserID($userID);

$itemlist=$it->getListUser($mysqli,$db_name);


//$auc->set
//$members=$us->getListUndelete($mysqli,$db_name);

include_once 'Application/views/auction.php';

//include_once 'Application/views/members.php';
?>