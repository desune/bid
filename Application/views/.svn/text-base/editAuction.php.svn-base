<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php include_once 'Application/views/head.php'; ?>
<center>
    <div class="table">
<h1>Thay đổi thông tin sản phẩm</h1>
<table>
<?php 
print ' <form action="index.php?control=editAuction&item='.$_GET['item'].'&auction='.$_GET['auction'].'"  method="post">';
//print "value=".$_GET['value']."<BR />";
print '<TD>type : </TD><TD>'.$aucview->getType().'</TD><TD>Change to</TD><TD><input type="text" name="type"></TD>';
print '<TR />';
print '<TD>minprice : </TD><TD>'.$aucview->getMinprice().'</TD><TD>Change to</TD><TD><input type="text" name="minprice"></TD>';
print '<TR />';

print '<TD></td><td><input type="submit" name="editAuction" value="editAuction" class="button_thamgia"></TD>';      
print '</form>';
?>
</table></div>
</center>
<?php include_once'Application/views/footer.php'; ?>