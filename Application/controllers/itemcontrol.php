<?php

include_once 'Application/models/users.php';
include_once 'Application/models/item.php';
include_once 'Application/models/itemtype.php';
include_once 'Application/models/auction.php';
$isadmin = new users();
$isadmin->setUserID($_SESSION['userID']);
$isadmin = $isadmin->getUser($mysqli, $db_name);
$error = "";
$errorNum = 0;
if ($isadmin->getAdmin() == 0) {
    $error = $error . "Bạn không có quyền thực hiện của admin";
    $errorNum++;
}

$auc = new auction();
//print 'new auc()';
$it = new item();
if ($errorNum == 0) {
    $result = $it->getListAll($mysqli, $db_name);

    $itt = new itemtype();
    include_once 'Application/views/itemcontrol.php';
} else {
    print "Bạn Không có quyền hạn này";
    //print $error;
    //header("Location:index.php");
}
?>