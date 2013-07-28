<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING);
?>
<?php include_once 'Application/views/admin.php'; ?>
<?php $kt1 = $auc->getResttime(); ?>
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

    var kt1='<?php echo $kt1; ?>';

    function init() {
        x=(kt1/3600);x=int1(x);x1=""+x;
        y=(kt1-x*3600)/60;y=int1(y);y1=":"+y;
        z=kt1-x*3600-y*60;z1=":"+z;
        cd(x1,y1,z1);
    }
    window.onload = init;</script>
<center>
    <div class="h1">Quản Lý Đấu Giá</div>
    <?php
    if ($errorNum != 0) {
        print '<font color=\"white\" size=\"15\">' . $error . '</font>';
    }
    ?>
    <div class="table">
        <form name="cd1" action="index.php?control=bidcontrol&auctionID=<?php echo $auctionID; ?>&price=<?php echo $price; ?> " method="post">
            <center>
                <table><tr><th rowspan="6" width="210"><img src="<?php echo $it->getPhoto(); ?>" width="210" height="210"></th> </tr>
                    <tr><td class="title" colspan="2" width="600"><?php echo $it->getDetail(); ?></td><td class="title" width="250">Bảng Xếp Hạng</td></tr>
                    <tr><td><div class="tdTitle">Phí Đặt Giá: </div>Miễn Phí 1 Lượt</td><td><div class="tdTitle">Giá Thị Trường</div>14.699.000 VND</td>
                        <td rowspan="5">
                            <div class="wbox">
                                <div class="top100_scroll" style="max-height: 340px; opacity: 1;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td class="rank_hed">Hạng</td>
                                                <td class="rank_hed">Người Chơi</td>
                                                <td class="rank_hed">Mức Giá</td>
                                            </tr>
                                            <?php
                                            $bid = new bid();
                                            $bid->setAuctionID($auctionID);
                                            //var_dump($bid);
                                            if ($bid->getListByAuction($mysqli, $db_name) != null) {
                                                $bid = $bid->getListByAuction($mysqli, $db_name);
                                                $user = new users();
                                                for ($e = 0; $e < count($bid); $e++) {
                                                    $price = $bid[$e]->getPrice();
                                                    $user->setUserID($bid[$e]->getUserID());
                                                    print '<tr><td class="rank_td">' . ($e + 1) . '</td><td class="rank_td"><a style="text-decoration: none;" href="index.php?control=user&value=' . $user->userID . '">' . $user->getUser($mysqli, $db_name)->getName() . '</a></td><td>' . $price . '</td></tr>';
                                                }
                                            } else {
                                                print "<tr><td colspan=3> San pham nay chua co ai dau gia!!!</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td></tr>
                    <tr><td><div class="tdTitle">Thời Gian Còn Lại</div><input id="txt" readonly="true" type="text" value="" border="1" name="disp1"></td><td><div class="tdTitle">Đặt Giá:</div><input type="text" name="price"></td></tr>
                    <tr><td colspan="2"><input id="join_bid" type="submit" name="bidcontrol" class="button_thamgia" value="Tham gia dau gia"></td></tr>
                    <tr><td colspan="2"><div style=" color: red; font-weight: bold; font-size: 13px;">Người chiến thắng sẽ được nhận sản phẩm miễn phí (không phải trả tiền)</div> </td></tr>

                </table>
            </center>
        </form>
    </div>
</center>
<?php include_once'Application/views/footer.php'; ?>