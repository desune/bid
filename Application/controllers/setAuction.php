<?php
if (isset($_POST['setAuction'])) {
    include_once 'Application/models/auction.php';
    include_once 'Application/models/item.php';
    include_once 'Application/models/itemtype.php';
    $it = new item();
    $itemID = $_GET['value'];
    $auccheck = new auction();
    $auccheck->setItemID($itemID);
    $type = $_POST['type'];
    $minprice = $_POST['minprice'];
    $userID = $_SESSION['userID'];
    $passwd = $_POST['passwd'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    
    $error = "";
    $errorNum = 0;
    if (strlen($userID) != 0) {
        $it->setItemID($itemID);

        $it->setUserID($userID);

        if (!($it->checkOwner($mysqli, $db_name))) {
            echo $error = $error . "Ban khong phai la chu so huu item nay!!";
            $errorNum++;
        }
    } else {
        echo $error = $error . "Ban chua dang nhap nen khong the thuc hien chuc nang nay!!";
        $errorNum++;
    }
    if ($auccheck->getAuctionByItemID($mysqli, $db_name) != null) {
        echo $error = $error . "Sản phẩm này đã đặt đấu giá bạn không thể tiếp tục!!";
        $errorNum++;
    }
    $it->setItemID($itemID);
    $it->setPasswd($passwd);
    if (!($it->checkLogin($mysqli, $db_name))) {
        echo $error = $error . "Passwd item nhap vao sai!!";
        $errorNum++;
    }

    if (!isset($itemID)) {
        echo $error = $error . "Ban chua chon item cho phien dau gia!!";
        $errorNum++;
    }

    if (!isset($type)) {
        echo $error = $error . "Nhap vao loai dau gia!!";
        $errorNum++;
    }
    if (!isset($minprice)) {
        echo $error = $error . "Hay nhap vao gia san pham!!";
        $errorNum++;
    }
    $check = new auction();

    $check->setItemID($itemID);
    if ($check->getIsset($mysqli, $db_name)) {
        echo $error = $error . "Ban da dang ky phien dau gia cho item nay!!";
        $errorNum++;
    }
    if ($errorNum == 0) {
        $auc = new auction();

        $auc->setItemID($itemID);
        $auc->setStartdate($startdate);
        $auc->setEnddate($enddate);
        $auc->setMinprice($minprice);
        $itemtype= new itemtype();
        $itemtype->setName($type);
        $itemtype = $itemtype->getTypeIDbyTypeName($mysqli, $db_name);
        $auc->setType($itemtype->getItemTypeID());

        
        $auc->add($mysqli, $db_name);


        unset($_POST['type']);
        unset($_POST['minprice']);
        unset($_POST['passwd']);
        unset($_POST['startdate']);
        unset($_POST['enddate']);
        //print $us->getUserID();
        //print $us->getPasswd();
        header("Location:index.php?control=auction");
    } else {
        //print  $error."!!!<BR>";
        include_once 'Application/views/setAuction.php';
    }
} else {
    //	print "Dang nhap sai !!!<BR>";
    include_once 'Application/views/setAuction.php';
}
?>