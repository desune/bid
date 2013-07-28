<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
$error = "";
$errorNum = 0;
include_once 'Application/models/auction.php';
include_once 'Application/models/item.php';
include_once 'Application/models/users.php';
include_once 'Application/models/bid.php';


$it = new item();
$auc = new auction();
$us = new users();
$b = new bid();
$ustemp = new users();
$userID = $_SESSION['userID'];
$auctionID = $_GET['auctionID'];


if (strlen($userID) != 0) {
    $us->setUserID($userID);
    $us = $us->getUser($mysqli, $db_name);
} else {
    $error = $error . 'Ban chua dang nhap!!!!<br>';
    $errorNum++;
}

if (strlen($auctionID) != 0) {  // print 'auc='.$auctionID;
    $auc->setAuctionID($auctionID);
    $auc = $auc->getAuction($mysqli, $db_name);
    $it->setItemID($auc->getItemID());
    $it = $it->getItem($mysqli, $db_name);
    $b->setAuctionID($auctionID);

    $listuser = $b->getListUserByAuction($mysqli, $db_name);

    if ($auc->getResttime() <= 0) {
        $error = $error . "Phien dau gia da ket thuc!!<br>";
        $errorNum++;
    }

    if ($auc->getMinprice() > $us->getAmount()) {
        $error = $error . "Ban khong du tien tham gia phien dau gia nay!!<br>";
        $errorNum++;
    }
} else {
    $error = $error . "Phien dau gia khong ton tai hoac da ket thuc!!<br>";
    $errorNum++;
}
if (isset($_POST['bidcontrol'])) {
    $price = $_POST['price'];
    unset($_POST['bidcontrol']);

    if ((!isset($price)) || (strlen($price) == 0)) {
        $error = $error . 'Ban chua tra gia cho san pham!!!!<br>';
        $errorNum++;
    }
    $maxbid = new bid();
    $maxbid->setAuctionID($auctionID);
    $maxbid = $maxbid->getBidWinner($mysqli, $db_name);
    $lastuser = new users();
    $lastuser->setUserID($maxbid->getUserID());
    $lastuser = $lastuser->getUser($mysqli, $db_name);
    if ($price < $maxbid->getPrice()) {
        $error = $error . 'Nguoi dat gia cao nhat hien tai la :' . $lastuser->getName() . '<BR>Voi muc gia:' . $maxbid->getPrice() . '<BR /> Ban can dat gia cao hon de tro thanh nguoi chien thang!!!<br>';
        $errorNum++;
    }

    if ($errorNum == 0) {
        $b->setAuctionID($auctionID);
        $b->setUserID($userID);
        $b->setPrice($price);
        if (date('H') == "00") {
            $date = date('Y-m-' . (date('d') - 1) . ' ' . '23' . ':i:s');
        }
        else
            $date = date('Y-m-d ' . (date('H') - 1) . ':i:s');


        $b->setTime($date);
        $b->add($mysqli, $db_name);

        $last = new users();
        $last->setUserID($lastuser->getUserID());
        $last->setAmount($lastuser->getAmount() + $maxbid->getPrice());
        $last->update($mysqli, $db_name);

        $currentUser = new users();
        $currentUser->setUserID($userID);
        $currentUser = $currentUser->getUser($mysqli, $db_name);
        $currentUserUpdate = new users();
        $currentUserUpdate->setUserID($userID);
        $currentUserUpdate->setAmount($currentUser->getAmount() - $price);
        $currentUserUpdate->update($mysqli, $db_name);
        //print "Lay tien thanh cong";

        $bidsucces = "Ban dau gia thanh cong<br>";
        unset($_POST['price']);
        include_once 'Application/views/bidcontrol.php';
    }
    else {
        include_once 'Application/views/bidcontrol.php';
    }
} else {

    include_once 'Application/views/bidcontrol.php';
}
?>