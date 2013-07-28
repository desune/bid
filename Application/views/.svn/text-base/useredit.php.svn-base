<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php 
include_once 'Application/views/head.php';
?>
<?php 
include_once 'Application/models/users.php';
$kt=$_SESSION['userID'];
$us1=new users();
$us1->setUserID($kt);
$result1=$us1->getUser($mysqli,$db_name);
$bd=$result1->getBirthday();
$na=$result1->getName();
$ma=$result1->getEmail();
$pho=$result1->getPhone();
?>
     <center><h1>Thay doi thong tin ca nhan</h1>
     <font color=green><?php print"$success";?></font>
     </center>
     <center><table>               
      <form action="index.php?control=useredit" method="post">      
<tr><td>NewPasswd</td><td><input type="password" name="newpasswd"></td></tr>
<tr><td>Confirm Passwd</td><td>   	<input type="password" name="renewpasswd"></td><td><font color=red><?php print"$error1";?></font></td></tr>
<tr><td>Name	</td><td>	  <input type="text" name="name" value="<?php print"$na";?>"></td></tr>
<?php 
if($result1->getSex()==1){
	print'<tr><td>Sex</td><td> Male <input type="radio" name="sex" value=1 checked> Female <input type="radio" name="sex" value=0></td></tr>';
}else{
    print'<tr><td>Sex</td><td> Male <input type="radio" name="sex" value=1> Female <input type="radio" name="sex" value=0 checked></td></tr>';
}
?>
<tr><td>Birthday </td><td>	  <input type="text" name="birthday" value="<?php print"$bd"?>"></td></tr>
<tr><td>Mail</td><td><input type="text" name="email" value="<?php print"$ma"?>"></input></td></tr>
<tr><td>Phone	</td><td>	  <input type="text" name="phone" value="<?php print"$pho"?>"></td></tr>
<tr><td>Passwd	</td><td>         <input type="password" name="passwd"> </td><td><font color=red><?php print"$error2";?></font></td></tr>
<tr><td></td><td><input type="submit" name="useredit" value="Save"></td></tr>      
</form>
</table>
<?php
include_once'Application/views/footer.php';
?>