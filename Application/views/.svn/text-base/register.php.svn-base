<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
include_once'Application/views/head.php';
?>
<h1 align="center">Thông tin tài khoản</h1>
    <?php
    if (strcmp($success, NULL) != 0 ){
    	print '<font color=red>';
    	print '<a href="index.php?control=login">'.$success.'</a>';
    	print '</font>';
    }
    
    ?>
    <form action="index.php?control=register" method="post">      
        <label>User</label>    
        <input type="text" name="userID"> 
        <font color=red><?php print"$error1"; ?></font><br>
        <label>Password</label>    
        <input type="password" name="passwd">
        <font color="red"><?php print"$error2"; ?></font><br>
        <label>Confirm Passwd</label>
        <input type="password" name="repasswd">
        <font color="red"><?php print"$error3"; ?></font><br>
        <label>Name</label><input type="text" name="name">
        <font color="red"><?php print"$error4"; ?></font><br>
        <label>Sex</label>&nbsp;&nbsp;
        Male<input type="radio" name="sex" value=1 checked>
        Female<input type="radio" name="sex" value=0>
        <font color="red"><?php print"$error5"; ?></font><br>
        <label>Email</label>
        <input type="text" name="email">
        <font  color="red"><?php print"$error6"; ?></font><br>
        <label>Birthday</label><input type="text" name="birthday">(yyyy-mm-d)
        <font color="red"><?php print"$error8"; ?></font><br>
        <label>Phone</label><input type="text" name="phone">
        <font color=red><?php print"$error7"; ?></font><br>

        <label></label><input type="submit" name="register" value="register">

    </form>
<?php
include_once'Application/views/footer.php';
?>