<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING);
?>
<?php
include_once'Application/views/head.php';
?>
<center>
    <div class="h1"><span style="margin-top: 50px">Đăng nhập</span></div></center>
<?php
print'<font color=red>';
print"$error";
print'</font>';
?>
<center>
<div id="dgn_item_bid">
    <div class="dgn_item_bid" style="width: 500px;">
        <form action="index.php?control=login" method="post">  
            <span style="width: 250px;">User<span style="width: 33px"></span><input type="text" name="userID"></span><br>
            <span style="width: 250px;">Password<input type="password" name="passwd"></span><br>
            <span style="width: 60px;"></span><input class="button_thamgia" style="width: 160px; margin-left: 10px" type="submit" name="login" value="login">
        </form>
    </div>
</div>
    </center>
<?php
include_once'Application/views/footer.php';
?>