<?php
include_once 'Application/models/card.php';

include_once 'Application/models/users.php';



$userID=$_SESSION['userID'];



	if(isset($_POST['paypalcontrol'])) 
	{	
		unset($_POST['paypalcontrol']);
		$skey=$_POST['skey'];
		$amount=$_POST['amount'];
	//	print $skey.$amount;
		$ca=new card();
		$ca->setSkey($skey);
		$ca->setAmount($amount);
		$ca->add($mysqli,$db_name);
		unset ($_POST['skey']);
		unset ($_POST['amount']);
	//	print 'succes!!';
		include_once 'Application/views/paypalcontrol.php';
		
	}
	else
	{


	include_once 'Application/views/paypalcontrol.php';
	}
//include_once 'Application/views/members.php';
?>