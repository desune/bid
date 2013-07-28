<?php
include_once 'Application/views/head.php';
include_once'Application/models/itemtype.php';
$ittype = new itemtype();
$itlist = $ittype->getList($mysqli, $db_name);
?>

<center>
    <div class="h1"><span style="margin-top: 50px">Danh sách các mặt hàng đang đấu giá</span></div>
    <div id="dgn_item_bid">
        <form action="index.php?control=bidview" method="post">
            <?php
            print '<select name="itemTypeID">';
            for ($i = 0; $i < count($itlist); $i++) {
                print'<option value="' . $itlist[$i]->getItemTypeID() . '">' . $itlist[$i]->getName() . '</option>';
            }
            ?>
            </select>
            <input type="submit" name="bidview" value="view">
        </form><br>
        <?php
        if (isset($itemType)) {
            for ($i = 0; $i < count($aucrunninglist); $i++) {
                $it->setItemID($aucrunninglist[$i]->getItemID());
                $it = $it->getItem($mysqli, $db_name);
         ?>
        
<script type="text/javascript">
    var mins;
    var secs;
    var hours;
    var x,y,z;
    var x1,y1,z1;
    function int1(k)
    {
        var i;
        for(i=0;i<k;i++)
        {}
        return i-1;
    }
    function cd(h1,m1,s1){
	
        hours= 1 * h(h1);
        mins = 1 * m(m1); // change minutes here
        secs = 0 + s(s1); // change seconds here (always add an additional second to your total)
        redo();
    }
    function h(obj) {
        for(var i = 0; i < obj.length; i++) {
            if(obj.substring(i, i + 1) == ":")
                break;
        }
        return(obj.substring(0, i));
    }
    function m(obj) {
        for(var i = 0; i < obj.length; i++) {
            if(obj.substring(i, i + 1) == ":")
                break;
        }
        return(obj.substring(i+1,obj.length));
    }
    function s(obj) {
        for(var i = 0; i < obj.length; i++) {
            if(obj.substring(i, i + 1) == ":")
                break;
        }
        return(obj.substring(i + 1, obj.length));
    }
    function dis(mins,secs,hours) {
        var disp;
        if(hours<=9)
        {
            disp="0";
        }
        else {disp="";}
        disp+=hours+":";
        if(mins <= 9) {
            disp += "0";
        } else {
            disp += " ";
        }
        disp += mins + ":";
        if(secs <= 9) {
            disp += "0" + secs;
        } else {
            disp += secs;
        }
        return(disp);
    }
    function redo() {
        secs--;
        if(secs == -1) {
            secs = 59;
            mins--;
        }
        if(mins==-1)
        {mins=59;
            hours--;
        }
        document.cd1.disp1.value =dis(mins,secs,hours); // setup additional displays here.
        if((mins == 0) && (secs == 0)&&(hours==0)) {
            // change timeout message as required
            // window.location = "yourpage.htm" // redirects to specified page once timer ends and ok button is pressed
        } else {
            cd = setTimeout("redo()",1000);
        }
    }
<?php $kt1 = $aucrunninglist[$i]->getResttime(); ?>
    var kt1='<?php echo $kt1; ?>';

    function init() {
        x=(kt1/3600);x=int1(x);x1=""+x;
        y=(kt1-x*3600)/60;y=int1(y);y1=":"+y;
        z=kt1-x*3600-y*60;z1=":"+z;
        cd(x1,y1,z1);
    }
    window.onload = init;</script>

                <div class="dgn_item_bid" onclick="location.href='index.php?control=bidcontrol&auctionID=<?php echo $aucrunninglist[$i]->getAuctionID(); ?>';">
                    <div class="dgn_item_img"><img src="<?php echo $it->getPhoto(); ?>"   width="200" height="200"></div>
                    <div class="dgn_item_detail"><p><span class="dgn_title_blue" align="left"><?php echo $it->getDetail(); ?></span></p><br><br><br>
                        <p>Phí đấu:<strong>Miễn phí 1 Lượt</strong></p>
                        <p>Kết thúc:<strong><?php echo $aucrunninglist[$i]->getEnddate(); ?></strong></p><br><br><br><br><br><br>
                        <?php if(count($aucrunninglist)==1){ ?>
                        <p><form name="cd1" action="" method="post">
                            <div class="tdTitle" style="color: #FF9900; font-size: 14px">Thời Gian Còn Lại</div><input id="txt" readonly="true" type="text" value="" border="1" name="disp1"></form></p>
                        <?php } ?>
                    </div></div>

         	<?php
            }
        }
        ?>
    </div>
</center>
<?php
include_once'Application/views/footer.php';
?>
