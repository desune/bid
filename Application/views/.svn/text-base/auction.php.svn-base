<?php 
include_once 'Application/views/myuserhead.php';
?>
<div id=content>
<center>
    <div class="h1">Sản phẩm đấu giá của bạn</div>
    <div id="dgn_item_bid">
        <?php
        for ($i = 0; $i < count($itemlist); $i++) {
            $temp = (string) $itemlist[$i]->getItemID();
            $auc->setItemID($temp);
            if ($auc->getIsset($mysqli, $db_name)) {
                $auc = $auc->getAuctionByItemID($mysqli, $db_name);
                if ($auc->getAllow() == 1) {
                    if ($auc->getStarted() == 1) {
                        ?>
                        <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $itemlist[$i]->getItemID(); ?>';">
                            <div class="dgn_item_img"><img src="<?php echo $itemlist[$i]->getPhoto(); ?>"   width="200" height="200"></div>
                            <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $itemlist[$i]->getDetail(); ?></span></p>
                                <p>Giá thấp nhất:<strong><?php echo $auc->getMinprice(); ?></strong></p>
                                <p>Kết thúc:<strong>21:00 30/12/2012</strong></p>
                                <p>Phiên đấu giá này đã thực hiện</p>
                                <p><a href="index.php?control=editAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Edit</a> <strong><a href="index.php?control=deleteAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Delete</a></strong></p>
                                <p><span class="dgn_item_time" style="background:url(Public/images/321.png) top left no-repeat;" ><span class="bold"><span class="sb_bid_time_"><?php echo $itemlist[$i]->getDate(); ?></span></span></span></p></div></div>

                    <?php } else { ?>
                        <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $itemlist[$i]->getItemID(); ?>';">
                            <div class="dgn_item_img"><img src="<?php echo $itemlist[$i]->getPhoto(); ?>"   width="200" height="200"></div>
                            <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $itemlist[$i]->getDetail(); ?></span></p>
                                <p>Giá thấp nhất:<strong><?php echo $auc->getMinprice(); ?></strong></p>
                                <p>Kết thúc:<strong>21:00 30/12/2012</strong></p>
                                <p><a href="index.php?control=runAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Run auction</a></p>
                                <p><a href="index.php?control=editAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Edit</a></strong> <strong><a href="index.php?control=deleteAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Delete</a></strong></p>
                                <p><span class="dgn_item_time" style="background:url(Public/images/321.png) top left no-repeat;" ><span class="bold"><span class="sb_bid_time_"><?php echo $itemlist[$i]->getDate(); ?></span></span></span></p></div></div>

                    <?php }
                } else { ?>
                    <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $itemlist[$i]->getItemID(); ?>';">
                        <div class="dgn_item_img"><img src="<?php echo $itemlist[$i]->getPhoto(); ?>"   width="200" height="200"></div>
                        <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $itemlist[$i]->getDetail(); ?></span></p>
                            <p>Giá thấp nhất:<strong><?php echo $auc->getMinprice(); ?></strong></p>
                            <p>Kết thúc:<strong>21:00 30/12/2012</strong></p>
                            <p>Đang trong quá trình kiểm tra</p>
                            <p><strong><a style="text-decoration:none;" href="index.php?control=editAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Edit </a> </strong><strong><a style="text-decoration:none;" href="index.php?control=deleteAuction&item=<?php echo $auc->getItemID(); ?>&auction=<?php echo $auc->getAuctionID(); ?>">Delete</a></strong></p>
                            <p><span class="dgn_item_time" style="background:url(Public/images/321.png) top left no-repeat;" ><span class="bold"><span class="sb_bid_time_"><?php echo $itemlist[$i]->getDate(); ?></span></span></span></p></div></div>

                    <?php }}}?>
    </div>
</center>
<?php include_once'Application/views/footer.php'; ?>
