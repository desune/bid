<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
include_once 'Application/views/myuserhead.php';
?>
            <div id=content>
            <center>
            <?php 
            print "<BR />";
            print "UserID : ".$result->getUserID();
            print "<BR />";
            print "Name	  : ".$result->getName();
            print "<BR />";
            if ($result->getAdmin()==1)
            {
            	print "admin/mem : admin";
            }
            else
            {
            	print "admin/mem : member";
            }
            print "<BR />";
            if ($result->getSex()==1)
            {
            	print "Sex   :male";
            }
            else
            {
            	print "Sex   :female";
            }
            print "<BR />";
            print "Email    : ".$result->getEmail();
            print "<BR />";
            print "Birth day: ".$result->getBirthday();
            print "<BR />";
            
            if (isset($_SESSION['userID']))
            {
            	if ($result->getUserID() != $_SESSION['userID'])
            	{
            		print "So tien trong tai khoan cua ban  :".$result->getAmount();
            		print '<BR />';
            	}
            
            }
            
            ?>
            </center>
            <?php 
            include_once 'Application/views/footer.php';
            ?>