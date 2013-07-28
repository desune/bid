<?php
//$date=date('Y-m-d:'.(date('H')-1).':i:s');
	//print 'day='.$date;
	if(isset($_POST['itemadd'])) {
			// neu ma capccha trung
	include_once 'Application/models/item.php';
	
	
	$userID=$_SESSION['userID'];
	$photo=$_POST['photo'];
	$detail=$_POST['detail'];
	$passwd=$_POST['passwd'];
	$repasswd=$_POST['repasswd'];
	$itemTypeID=$_POST['itemTypeID'];
	if (date('H')=="00")
	{
		$date=date('Y-m-'.(date('d')-1).' '.'23'.':i:s');
	}
	else
	$date=date('Y-m-d '.(date('H')-1).':i:s');
	//print 'day='.$date;
	//print "input :".$userID;
	//print "pass	 :".$passwd;
	
	$error="";
	$errorNum=0;
    $success="";
	if (!isset($userID))
	{
		$error=$error."Ban chua dang nhap!!";
			$errorNum++;
	}
	if ((!isset($passwd))||(strlen($passwd)==0))
	{
		$error=$error."Chua nhap vao passwd cho item!!";
		$errorNum++;
	}
	if ((!isset($repasswd))||(strlen($repasswd)==0))
	{
		$error=$error."Chua nhac lai passwd cho item!!";
		$errorNum++;
	}
	if ((!isset($photo))||(strlen($photo)==0))
	{
		$error=$error."Hay nhap vao link cho anh!!";
		$errorNum++;
	}
	if ((!isset($detail))||(strlen($detail)==0))
	{
		$error=$error."Chua nhap vao thong tin chi tiet ve san pham!!";
		$errorNum++;
	}
	if (!isset($itemTypeID))
	{
		$error=$error."Chua nhap vao loai Item!!";
		$errorNum++;
	}

	if(strcmp($passwd,$repasswd)!=0)
		{
		$error=$error."Passwd nhac lai khong trung voi passwd!!";
		$errorNum++;	
		}

	if ($errorNum==0)
	{	$success=$success."Bạn đã thêm sản phẩm thành công";
		$it=new item();
		$it->setDate($date);
		$it->setDetail($detail);
		$it->setItemTypeID($itemTypeID);
		$it->setPasswd($passwd);
		$it->setPhoto($photo);
		$it->setUserID($userID);

	 	$it->add($mysqli,$db_name);

	//print "added";
		unset($_POST['photo']);	
		unset($_POST['detail']);
		unset($_POST['passwd']);
		unset($_POST['repasswd']);
		unset($_POST['itemTypeID']);
	 	//print $us->getUserID();
	
	 	//print $us->getPasswd();
		include_once 'Application/views/itemadd.php';
	}		
	else
	{	
		//print  $error."!!!<BR>";
		include_once 'Application/views/itemadd.php';
	}
	}
	else
	{	
	//	print "Dang nhap sai !!!<BR>";
		include_once 'Application/views/itemadd.php';
	}
	
?>