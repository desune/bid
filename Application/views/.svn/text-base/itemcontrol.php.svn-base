<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
include_once 'Application/views/admin.php';
?>
<center>
    <div class="h1">Quản Lý Sản Phẩm</div>
    <div id="dgn_item_bid">
        <?php
        for ($i = 0; $i < count($result); $i++) {
            $auc->setItemID($result[$i]->getItemID());
            
            if (!$auc->getIsset($mysqli, $db_name)) {
                
                if ($result[$i]->getSold() == 1) {
                    ?>
                            <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $result[$i]->getItemID(); ?>';">
                                <div class="dgn_item_img"><img src="<?php echo $result[$i]->getPhoto(); ?>"   width="200" height="200"></div>
                                <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $result[$i]->getDetail(); ?></span></p>
                                    <p>Phí đấu:<strong>Miễn phí 1 lượt</strong></p>
                                    <p>Thời gian khởi tạo:<span class="bold"><span class="sb_bid_time_"><strong><?php echo $auc->getStartdate(); ?></strong></span></span></p>
                                    <br><br><p><a style="text-decoration: none" href="index.php?control=setAuction&value=<?php echo $result[$i]->getItemID(); ?>">Set Auction</a></span></p></div></div>

                            <?php  } else { ?>
                    <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $result[$i]->getItemID(); ?>';">
                                <div class="dgn_item_img"><img src="<?php echo $result[$i]->getPhoto(); ?>"   width="200" height="200"></div>
                                <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $result[$i]->getDetail(); ?></span></p>
                                    <p>Phí đấu:<strong>Miễn phí 1 lượt</strong></p>
                                    <p>Thời gian khởi tạo:<span class="bold"><span class="sb_bid_time_"><strong><?php echo $auc->getStartdate(); ?></strong></span></span></p><br><br>
                                    <br><br><p><a style="text-decoration: none" href="index.php?control=setAuction&value=<?php echo $result[$i]->getItemID(); ?>">Set Auction</a></span></p></div></div>
<?php } } else { $auc = $auc->getAuctionByItemID($mysqli, $db_name);?>
                <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $result[$i]->getItemID(); ?>';">
                                <div class="dgn_item_img"><img src="<?php echo $result[$i]->getPhoto(); ?>"   width="200" height="200"></div>
                                <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $result[$i]->getDetail(); ?></span></p>
                                    <p>Phí đấu:<strong>Miễn phí 1 lượt</strong></p>
                                    <p>Thời gian khởi tạo:<span class="bold"><span class="sb_bid_time_"><strong><?php echo $auc->getStartdate(); ?></strong></span></span></p><br><br>
                                    <br><br><p><a style="text-decoration: none" href="index.php?control=setAuction&value=<?php echo $result[$i]->getItemID(); ?>">Set Auction</a></span></p></div></div>
<?php } }  ?>
    </div>
</center>
<BR />
<a href="index.php?control=itemadd">Add new item</a>
<?php
include_once'Application/views/footer.php';
?>
