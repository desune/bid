<?php
include_once 'Application/models/card.php';
	include_once 'Application/models/users.php';
	$ca=new card();
//print 'paypal1';
	if(isset($_POST['paypal'])) {
	//	print 'paypal2';
			// neu ma capccha trung
			unset ($_POST['paypal']);
	
	$userID=$_SESSION['userID'];
	$skey=$_POST['skey'];
	$ca->setSkey($skey);
//	print $skey;
	//print 'day='.$date;
	//print "input :".$userID;
	//print "pass	 :".$passwd;
	
	$error="Co loi xay ra";
	$errorNum=0;

	if (!isset($userID))
	{
		$error=$error."Ban chua dang nhap!!";
			$errorNum++;
	}
	//print 'isset userID';
	if ((!isset($skey))||(strlen($skey)==0))
	{
		$error=$error."Bạn cần nhập vào mã số thẻ cào!!";
		$errorNum++;
	}
	//print 'issetSkey+skey='.$ca->getSkey();
	if (!($ca->issetcard($mysqli,$db_name)))
	{// print 'khong hop le';
		$error=$error."Mã số thẻ cào không hợp lệ!!";
		$errorNum++;
	}
	else{
		//print 'else';
		if (!($ca->validcard($mysqli,$db_name)))
		{
			$error=$error."Thẻ đã được sử dụng!!";
			$errorNum++;
		}
		else
		{
			$ca=$ca->getCard($mysqli,$db_name);
			//print $ca->getAmount();
		}
	}
	//print 'error num='.$errorNum;	
	if ($errorNum==0)
	{	
		$us=new users();
		$us->setUserID($userID);
		$ustemp=$us->getUser($mysqli,$db_name);
		$us->setAmount($ustemp->getAmount()+intval($ca->getAmount()));
		$us->update($mysqli,$db_name);
	 	$ca->setSkey($skey);
	 	$ca->setInvalidkey($mysqli,$db_name);

	//print "added";
		unset($_POST['skey']);	

	 	//print $us->getUserID();
	
	 	//print $us->getPasswd();
	
		print "đã nạp thẻ thành công tài khoản quý khách tăng thêm :".$ca->getAmount()." đồng";
		print '<BR />';
		
		include_once 'Application/views/paypal.php';
	}		
	else
	{	
		print  $error."!!!<BR>";
		include_once 'Application/views/paypal.php';
	}
	}
	else
	{	
	//	print "Dang nhap sai !!!<BR>";
	
		include_once 'Application/views/paypal.php';
	}
	
?>