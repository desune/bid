<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
include_once 'Application/models/users.php';
include_once 'Application/views/head.php';
include_once'Application/models/item.php';
include_once'Application/models/auction.php';
$it = new auction();
$itlist = $it->getAuctionRunning($mysqli, $db_name);
?>

<?php
if (isset($_SESSION['userName'])) {
    $sf = $_SESSION['userName'];
    $uID = $_SESSION['userID'];
    print '<div class="hello" align="center">Chào bạn ' .'<a style="text-decoration: none" href="index.php?control=myuser&value='.$uID.'">'.$sf.'</a></div>';
}
?> 

<center>
    <div class="h1">Danh sách các mặt hàng có thể tham gia đấu giá</div>
    <div id="dgn_item_bid">
        <?php
        for ($i = 0; $i < count($itlist); $i++) {
            $it = new item();
            $it->setItemID($itlist[$i]->getItemID());
            $it = $it->getItem($mysqli, $db_name);
            ?>
            <?php 
            $idAuction = $itlist[$i]->getAuctionID();
            ?>
            <div class="dgn_item_bid" onclick="location.href='index.php?control=bidcontrol&auctionID=<?php echo $idAuction ?>';">
                <div class="dgn_item_img"><img src="<?php echo $it->getPhoto(); ?>"   width="200" height="200"></div>
                <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $it->getDetail(); ?></span></p>
                    <p>Phí đấu:<strong>Miễn phí 1 lượt</strong></p>
                    <p>Kết thúc:<strong>Đang đấu giá</strong></p>
                </div></div>
        <?php } ?>
    </div>
</center>
<?php include_once'Application/views/footer.php'; ?>
