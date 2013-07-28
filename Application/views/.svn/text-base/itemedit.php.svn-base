<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
include_once 'Application/views/head.php';
?>
<center>
    <div class="h1">Thay đổi thông tin sản phẩm</div>

    <form action="index.php?control=itemedit&value=' . $_GET['value'] . '"  method="post">
        <table><tr><th width="250">Hiện tại</th><th width="250">Thay Đổi</th></tr>
            <tr><td><img src="<?php echo $it->getPhoto(); ?>"   width="250" height="200"></td> <td><span style="width:75px"></span><input type="text" name="photo"></td></tr>
            <tr><td><span class="dgn_title_blue" align="left" style="width: 200px"><?php echo $it->getDetail(); ?></span></td><td><span style="width:83px"></span><textarea rows="3" cols="15" name="detail"></textarea></td></tr>
            <tr><td>New Pass:<br><span style="width:67px"></span><input type="password" name="newpasswd"></td><td><span style="width:83px"></span>Confirm new pass:<br><span style="width:75px"></span><input type="password" name="renewpasswd"></td></tr>
            <tr><td><span style="width:68px">Type:</span><input type="text" value="<?php echo $it->getItemTypeID(); ?>" readonly="true"></td><td><span style="width:75px"></span><input type="text" name="itemTypeID"></td></tr>
            <tr><td colspan="2">PassItem :<input type="password" name="passwd"></td></tr>
            <tr><td colspan="2"><input class="button_thamgia" style="width:550px"type="submit" name="itemedit" value="Save"></td></tr>
        </table>
    </form>
</center>
<?php include_once'Application/views/footer.php'; ?>