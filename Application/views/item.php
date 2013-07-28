<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php 
include_once 'Application/views/myuserhead.php';
?>
<div id=content>
<center>
    <div class="h1">Sản phẩm của bạn</div>
    <div id="dgn_item_bid">
            <?php
            $per_page = 4;
            $pages = ceil(count($result) / $per_page);
            $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
            $from_page = ($page - 1) * $per_page;
            $to_page = $page * $per_page;
            for ($j = $from_page; $j < $to_page; $j++) {
                if (isset($result[$j])) {
                    $auc->setItemID($result[$j]->getItemID());
                    if (!$auc->getIsset($mysqli, $db_name)) {
                        if ($result[$j]->getSold() == 1) {
                            ?>
                            <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $result[$j]->getItemID(); ?>';">
                                <div class="dgn_item_img"><img src="<?php echo $result[$j]->getPhoto(); ?>"   width="200" height="200"></div>
                                <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $result[$j]->getDetail(); ?></span></p>
                                    <p>Phí đấu:<strong>Miễn phí 1 lượt</strong></p>
                                    
                                    <p><span class="dgn_item_time" style="background:url(Public/images/321.png) top left no-repeat;" ><span class="bold"><span class="sb_bid_time_"><?php echo $result[$j]->getDate(); ?></span></span></span></p></div></div>

                            <?php
                        } else {
                            ?>
                            <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $result[$j]->getItemID(); ?>';">
                                <div class="dgn_item_img"><img src="<?php echo $result[$j]->getPhoto(); ?>"   width="200" height="200"></div>
                                <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $result[$j]->getDetail(); ?></span></p>
                                    <p>Đấu giá:  <strong><a style="text-decoration:none;" href="index.php?control=setAuction&value=<?php echo $result[$j]->getItemID(); ?>" >Đấu giá</a></strong></p>
                                    
                                    <p><span class="dgn_item_time" style="background:url(Public/images/321.png) top left no-repeat;" ><span class="bold"><span class="sb_bid_time_"><?php echo $result[$j]->getDate(); ?></span></span></span></p></div></div>

                            <?php
                        }
                    } else {
                        ?>
                        <div class="dgn_item_bid" onclick="location.href='index.php?control=itemedit&value=<?php echo $result[$j]->getItemID(); ?>';">
                            <div class="dgn_item_img"><img src="<?php echo $result[$j]->getPhoto(); ?>"   width="200" height="200"></div>
                            <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $result[$j]->getDetail(); ?></span></p>
                                <p>Đấu giá:<strong><a style="text-decoration:none;" href="index.php?control=setAuction&value=<?php echo $result[$j]->getItemID(); ?>" >Đấu giá</a></strong></p>
                                
                                <p><span class="dgn_item_time" style="background:url(Public/images/321.png) top left no-repeat;" ><span class="bold"><span class="sb_bid_time_"><?php echo $result[$j]->getDate(); ?></span></span></span></p></div></div>

                        <?php
                    }
                }
            }
            echo "<div class='pagination'>";
            if ($pages >= 1 && $page <= $pages) {
                for ($x = 1; $x <= $pages; $x++) {
                    echo ($x == $page) ? "<a href='index.php?control=item&page=" . $x . "'>" . $x . " </a>" : "<a href='index.php?control=item&page=" . $x . "'>" . $x . " </a>";
                }
            }
            echo "</div><br>";
            ?>

        </table>
    </div>
</center>
<BR />

<?php
//<a href="index.php?control=itemadd">Add new item</a>
//<a href="index.php?control=itemadd">Add new item</a>
//var_dump($_SESSION);
if (isset($_SESSION['userID'])|| isset($_SESSION['admin']))
{
	//var_dump($_SESSION['admin']);
	//var_dump($_SESSION['userID']);

	if($_SESSION['admin'] == 1){

		print '<a href="index.php?control=itemadd">Add new item</a>';
	}else{
		print '<a href="index.php?control=item">Add new item</a>';
	}
	print '<font color=\"white\">---->Ban khong the thuc hien chuc nang nay neu khong phai la admin</font>';
}
?>


<?php
include_once'Application/views/footer.php';
?>
