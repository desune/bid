<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
include_once'Application/views/head.php';
include_once'Application/models/itemtype.php';
$it = new itemtype();
$itlist = $it->getList($mysqli, $db_name);
?>
<center>
    <h1> Thêm sản phẩm </h1>
    <table>
        <tr>
        </tr>
        
        <form action="index.php?control=itemadd" method="post" enctype="multipart/form-data">
            <tr><td>Photo</td><td>         <input type="text" name="photo"><input type="file" name="file" id="file"><br></td></tr>  
            <tr><td>Passwd</td><td>         <input type="password" name="passwd"></td></tr>  
            <tr><td>Confirm Passwd</td><td>   	<input type="password" name="repasswd"></td></tr> 
            <tr><td>Detail</td><td>	 <textarea name ="detail" rows="3" cols="15"></textarea></td></tr> 
            <tr><td>itemType</td><td>	  <select name="itemTypeID">
                        <?php
                        for ($i = 0; $i < count($itlist); $i++) {

                            print'<option value="' . $itlist[$i]->getItemTypeID() . '">' . $itlist[$i]->getName() . '</option>';
                        }
                        ?>
                    </select></td></tr>
            <tr><td></td><td><input type="submit" name="itemadd" value="itemadd"></td></tr>
        </form>
    </table>
</center>
</body>
</html>