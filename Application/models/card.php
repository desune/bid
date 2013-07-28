<?php
class card{
private $skey;
private $aount;
private $valid;

public function setSkey($skey)
{
	$this->skey=md5($skey);	
}

public function setAmount($amount)
{
	$this->amount=$amount;	
}

public function setValid($valid)
{
	$this->valid=$valid;	
}

public function getSkey()
{
	return $this->skey;	
}

public function getAmount()
{
	return $this->amount;	
}

public function getValid()
{
	return $this->valid;	
}

//data control

public function add($mysqli,$db_name)
{

	 
//print "adding ";
$stmt = $mysqli->prepare("INSERT INTO `$db_name`.`card` VALUES ( ?, ?, 1);");
$stmt->bind_param("si",$this->skey,$this->amount);
$stmt->execute();
$stmt->close();
	
}	

public function issetcard($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`card` WHERE skey=?;";
//	print 'issetfunction skey='.$this->skey;
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("s",$this->skey);
 
	$stmt->execute();
	//print 'after execyte()';
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
//	print $stmt->num_rows;
 	if($rows != 0)
 	{
 //		print 'true';
 	return true;
 	}
 	else
 	return false;	
}

public function validcard($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`card` WHERE skey=? AND valid=1;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("s",$this->skey);
	$stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	return true;
 	else
 	return false;	
}

public function getCard($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`card` WHERE skey=?;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("s",$this->skey);
	$stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
	$stmt->bind_result($rskey,$ramount,$rvalid);
	$stmt->fetch();
    $tmp = new card();
    $tmp->setSkey($rskey);
  //  print "added :".$tmp->getUserID();
    $tmp->setAmount($ramount);
    $tmp->setValid($rvalid);
 
	//$stmt->bind_result($this->user);
	//$stmt->fetch();
	$stmt->close();
	return $tmp;
 	}
}
public function setInvalidkey($mysqli,$db_name)
{

	$stmt = $mysqli->prepare("UPDATE `$db_name`.`card` SET valid=0 WHERE skey=?;");
	$stmt->bind_param("s",$this->skey);
	$stmt->execute();
	$stmt->close();	
}

}
?>