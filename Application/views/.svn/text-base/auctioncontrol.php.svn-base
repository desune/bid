<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
include_once 'Application/views/admin.php';
?>
<center>
    <div class="h1">Quản lý sản phẩm đấu giá</div>
    <h4>Danh sách các phiên đấu giá chưa được giao dịch</h4>
    <div id="dgn_item_bid">
        <form action="index.php?control=auctioncontrol"  method="post">
            <?php
            for ($i = 0; $i < count($itemlist); $i++) {
                $temp = (string) $itemlist[$i]->getItemID();
                $auc->setItemID($temp);

                if ($auc->getIsset($mysqli, $db_name)) {
                    $auc = $auc->getAuctionByItemID($mysqli, $db_name);
                    if ($auc->getAllow() == 0) {
                        ?>
                        <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $itemlist[$i]->getItemID(); ?>';">
                            <div class="dgn_item_img"><img src="<?php echo $itemlist[$i]->getPhoto(); ?>"   width="200" height="200"></div>
                            <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $itemlist[$i]->getDetail(); ?></span></p>
                                <p>Giá thấp nhất:<strong><?php echo $auc->getMinprice(); ?></strong></p>
                                <p>Kết thúc:<strong><?php echo $auc->getEnddate(); ?></strong></p>
                                <p>Set Allow: <strong><input type="checkbox" name="aucIDList[]" value="<?php echo $auc->getAuctionID(); ?>"></strong>
                                <a style="text-decoration: none;" href="index.php?control=editAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Edit </a><strong><a style="text-decoration: none;" href="index.php?control=deleteAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Delete</a></strong></p>
                                <p><span class="dgn_item_time" style="background:url(Public/images/321.png) top left no-repeat;" ><span class="bold"><span class="sb_bid_time_"><?php echo $itemlist[$i]->getDate(); ?></span></span></span></p></div></div>

        <?php }
    }
} ?>
            <br><br>
            <input class="button_thamgia" type="submit" name="auctioncontrol" value="Set allow">    
        </form>
</center>
<?php
include_once'Application/views/footer.php';
?>
