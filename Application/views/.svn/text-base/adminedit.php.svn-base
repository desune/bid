<?php 
include_once'Application/views/head.php';
include_once 'Application/models/users.php';
print      '<center><h1>Quản lí Người dùng</h1>
<table><form action="index.php?control=adminedit&userID='.$_GET['userID'].'" method="post">';
$kt=$_GET['userID'];
$us1=new users();
$us1->setUserID($kt);
print'<font color=green>';print"$success";print'</font>';
//print "select ".$us->getUserID();
$result1=$us1->getUser($mysqli,$db_name);
$bd=$result1->getBirthday();
$na=$result1->getName();
$ma=$result1->getEmail();
$pho=$result1->getPhone();
?>
                     
<tr><td>NewPasswd</td><td><input type="password" name="newpasswd"></td></tr>
<tr><td>Confirm Passwd</td><td>   	<input type="password" name="renewpasswd"></td><td><font color=red><?php print"$error1";?></font></td></tr>
<tr><td>Name	</td><td>	  <input type="text" name="name" value="<?php print"$na";?>"></td></tr>
<tr><td>Set User as Admin :</td> <?php if($result1->getAdmin()==1)print'<td> <input type="checkbox" name="admin" value=1 checked>';
                                       else print'<td> <input type="checkbox" name="admin" value=1 >';
?></tr>
<?php if($result1->getSex()==1)print'<tr><td>Sex		</td><td> Male <input type="radio" name="sex" value=1 checked> Female <input type="radio" name="sex" value=0></td></tr>';
      else print'<tr><td>Sex		</td><td> Male <input type="radio" name="sex" value=1> Female <input type="radio" name="sex" value=0 checked></td></tr>';
?>
<tr><td>Birthday </td><td>	  <input type="text" name="birthday" value="<?php print"$bd"?>"></td></tr>
<tr><td>Mail</td><td><input type="text" name="email" value="<?php print"$ma"?>"></input></td></tr>
<tr><td>Phone	</td><td>	  <input type="text" name="phone" value="<?php print"$pho"?>"></td></tr>
<tr><td><?php if ($result1->getDelete()==1) print "UnDelete user"; else print "Delete user";?></td><td> <input type="checkbox" name="delete" value=1 ></td></tr>
<tr><td>Passwd	</td><td>         <input type="password" name="passwd"> </td><td><font color=red><?php print"$error2";?></font></td></tr>
<tr><td></td><td><input type="submit" name="adminedit" value="Save"></td></tr>      
</form>
</center>
</body>
</html>