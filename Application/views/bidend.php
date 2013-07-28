<?php
include_once 'Application/views/head.php';
?>
<center>
        <h1> ĐẤU GIÁ</h1>
        <div id="dgn_item_bid">
            <?php
                for ($i = 0; $i < count($auclistend); $i++) {
                    $it->setItemID($auclistend[$i]->getItemID());
                    $it = $it->getItem($mysqli, $db_name);
                    $auc->setAuctionID($auclistend[$i]->getAuctionID());
                    $auc = $auc->getAuction($mysqli, $db_name);
                    $b->setAuctionID($auclistend[$i]->getAuctionID());
                    $b = $b->getBidWinner($mysqli, $db_name);
                    $us->setUserID($b->getUserID());
                    $us = $us->getUser($mysqli, $db_name);
                    ?>
            <div class="dgn_item_bid" onclick="location.href='index.php?control=bidcontrol&auctionID=<?php echo $auclistend[$i]->getAuctionID(); ?>';">
                <div class="dgn_item_img"><img src="<?php echo $it->getPhoto(); ?>"   width="200" height="200"></div>
                <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $it->getDetail(); ?></span></p>
                    <p>Người thắng:<strong><a href=index.php?control=user&value=<?php echo $us->getUserID();?> " style="text-decoration: none;"><?php echo $us->getName(); ?></a></strong></p>
                    <p>Kết thúc:<strong><?php echo $auc->getEnddate(); ?></strong></p>
                    <p>Giá Thắng:<strong><span class="dgn_item_time"><span class="bold"><span class="sb_bid_time_"><?php echo $b->getPrice(); ?></span></span></span></p></div></div>
                    
            <?php } ?>
    </div>
</center>
<?php
include_once'Application/views/footer.php';
?>
