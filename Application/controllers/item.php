
<?php

include_once 'Application/models/item.php';
include_once 'Application/models/itemtype.php';
include_once 'Application/models/auction.php';
$auc=new auction();
//print 'new auc()';
$it=new item();

$userID=$_SESSION['userID'];

$it->setUserID($userID);
//print 'userID='.$it->getUserID();
$result=$it->getListUser($mysqli,$db_name);


$itt=new itemtype();
include_once 'Application/views/item.php';


?>
