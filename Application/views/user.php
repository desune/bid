<?php
include_once 'Application/views/head.php';
?>

<center>
    <div class="h1"><span style="margin-top: 50px">Thông tin người chơi</span></div>
    <div id="dgn_item_bid">
        <div class="dgn_item_bid" style="cursor: auto;width: 900px;">
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
				if (!strcmp($result->getUserID(),$_SESSION['userID']))
				{
				print "Số tiền trong tài khoản của bạn  :".$result->getAmount();
				print '<BR />'; 
				print '<a href="index.php?control=useredit">Edit</a></LEFT>';
				}
				
			}
			
			if ($_SESSION['admin']==1)
			{
				print '<a href="index.php?control=adminedit&userID='.$result->getUserID().'">Admin Edit</a></LEFT>';
			}
			?>
        </div>
    </div>
</center>
<?php include_once'Application/views/footer.php'; ?>