<?php
error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
?>
<?php
class item{
private $itemID;
private $userID;
private $date;
private $photo;
private $detail;
private $passwd;
private $itemTypeID;
private $admincheck;
private $sold;
//set 

public function setItemID($itemID)
{
	$this->itemID=$itemID;
}

public function setSold($sold)
{
	$this->sold=$sold;
}
public function getSold()
{
	return $this->sold;
}
public function setUserID($userID)
{
	$this->userID=$userID;
}

public function setDate($date)
{
	$this->date=$date;
}

public function setPhoto($photo)
{
	$this->photo=$photo;
}

public function setDetail($detail)
{
	$this->detail=$detail;
}

public function setPasswd($passwd)
{
	$this->passwd=md5($passwd);
}

public function setItemTypeID($itemTypeID)
{
	$this->itemTypeID=$itemTypeID;
}

public function setAdmincheck($admincheck)
{
	$this->admincheck=$admincheck;
}

//get 

public function getItemID()
{
	return $this->itemID;
}

public function getUserID()
{
	return $this->userID;
}

public function getDate()
{
	return $this->date;
}

public function getPhoto()
{
	return $this->photo;
}

public function getDetail()
{
	return $this->detail;
}

public function getPasswd()
{
	return $this->passwd;
}

public function getItemTypeID()
{
	return$this->itemTypeID;
}

public function getAdmincheck()
{
	return $this->admincheck;
}

//data function :

public function add($mysqli,$db_name){  
//print 'infunction add';
$stmt = $mysqli->prepare("INSERT INTO `$db_name`.`item` (`itemID`, `userID`, `date`, `photo` ,`passwd`, `itemTypeID`, `detail`) VALUES (0, ?, ?, ?, ?, ?,?);");
//print 'prepared';
//print $this->userID.'__'.$this->date.'__'.$this->photo.'__'.$this->passwd.'__'.$this->itemTypeID.'__'.$this->detail;
$stmt->bind_param("ssssis",$this->userID,$this->date,$this->photo,$this->passwd,$this->itemTypeID,$this->detail);
$stmt->execute();
$stmt->close();

}

public function update($mysqli,$db_name){  

if (isset($this->photo))
{
	$stmt = $mysqli->prepare("UPDATE `$db_name`.`item` SET photo=? WHERE itemID=?;");
	//print "Update photo =".$this->photo;
	$stmt->bind_param("si",$this->photo,$this->itemID);
	$stmt->execute();
	$stmt->close();
}

if (isset($this->sold))
{
	$stmt = $mysqli->prepare("UPDATE `$db_name`.`item` SET sold=? WHERE itemID=?;");
	$stmt->bind_param("ii",$this->sold,$this->itemID);
	$stmt->execute();
	$stmt->close();
}
if (isset($this->detail))
{
	$stmt = $mysqli->prepare("UPDATE `$db_name`.`item` SET detail=? WHERE itemID=?;");
	$stmt->bind_param("si",$this->detail,$this->itemID);
	$stmt->execute();
	$stmt->close();
}
if (isset($this->passwd))
{
	$stmt = $mysqli->prepare("UPDATE `$db_name`.`item` SET passwd=? WHERE itemID=?;");
	$stmt->bind_param("si",$this->passwd,$this->itemID);
	$stmt->execute();
	$stmt->close();
}
if (isset($this->itemTypeID))
{
	$stmt = $mysqli->prepare("UPDATE `$db_name`.`item` SET itemTypeID=? WHERE itemID=?;");
	$stmt->bind_param("ii",$this->itemTypeID,$this->itemID);
	$stmt->execute();
	$stmt->close();
}
if (isset($this->admincheck))
{
	$stmt = $mysqli->prepare("UPDATE `$db_name`.`item` SET admincheck=? WHERE itemID=?;");
	$stmt->bind_param("ii",$this->admincheck,$this->itemID);
	$stmt->execute();
	$stmt->close();
}

}

public function getListAll($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`item`;";
    $stmt = $mysqli->prepare($sql); 

	$stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
 //		print "$rows";
 	$i = 0;
 	$result = array();
 	$stmt->bind_result($ritemID,$ruserID,$rdate,$rphoto,$rdetail,$rpasswd,$ritemTypeID,$radmincheck,$rsold);
 	//$value=$stmt->fetch_array(MYSQLI_ASSOC); 
 	while ($stmt->fetch()) 
		 		{
		 	//	print "adding : ".$ritemID;
	       		 $tmp = new item();
	       		 $tmp->setitemID($ritemID);
	       	//	 print "added :".$tmp->getItemID();
	       		 $tmp->setPasswd($rpasswd);
	       		 $tmp->setUserID($ruserID);
	       		 $tmp->setDate($rdate);
	       		 $tmp->setPhoto($rphoto);
	       		 $tmp->setDetail($rdetail);
	       		 $tmp->setItemTypeID($ritemTypeID);
	       		 $tmp->setAdmincheck($radmincheck);
       		   $tmp->setSold($rsold);
	       		 $result[$i] = $tmp;
	       		 $i++;
	    		}
    	
	 }
	$stmt->close();
	return $result;
	

}

public function getListUser($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`item` WHERE userID=?;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("s",$this->userID);
    //print 'SELECT * FROM `$db_name`.`item` WHERE userID='.$this->userID.';';
    $stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
 //	print "$rows";
 	$i = 0;
 	$result = array();
 	$stmt->bind_result($ritemID,$ruserID,$rdate,$rphoto,$rdetail,$rpasswd,$ritemTypeID,$radmincheck,$rsold);
 	//$value=$stmt->fetch_array(MYSQLI_ASSOC); 
 	while ($stmt->fetch()) 
		 		{
		 	//print "adding : ".$ritemID.$ruserID;
	       		 $tmp = new item();
	       		 $tmp->setItemID($ritemID);
	       	//	 print "added :".$tmp->getItemID();
	       		 $tmp->setPasswd($rpasswd);
	       		 $tmp->setUserID($ruserID);
	       		 $tmp->setDate($rdate);
	       		 $tmp->setPhoto($rphoto);
	       		 $tmp->setDetail($rdetail);
	       		 $tmp->setItemTypeID($ritemTypeID);
	       		 $tmp->setAdmincheck($radmincheck);
       		   	 $tmp->setSold($rsold);
	       		 $result[$i] = $tmp;
	       		 $i++;
	    		}
    	
	 }
	$stmt->close();
	return $result;
	

}

public function getListUncheck($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`item` WHERE admincheck=0 ORDER BY date;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
 //	print "$rows";
 	$i = 0;
 	$result = array();
 	$stmt->bind_result($ritemID,$ruserID,$rdate,$rphoto,$rdetail,$rpasswd,$ritemTypeID,$radmincheck,$rsold);
 	//$value=$stmt->fetch_array(MYSQLI_ASSOC); 
 	while ($stmt->fetch()) 
		 		{
		 	//	 print "adding : ".$ritemID;
	       		 $tmp = new item();
	       		 $tmp->setitemID($ritemID);
	       		// print "added :".$tmp->getItemID();
	       		 $tmp->setPasswd($rpasswd);
	       		 $tmp->setUserID($ruserID);
	       		 $tmp->setDate($rdate);
	       		 $tmp->setPhoto($rphoto);
	       		 $tmp->setDetail($rdetail);
	       		 $tmp->setItemTypeID($ritemTypeID);
	       		 $tmp->setAdmincheck($radmincheck);
       		   $tmp->setSold($rsold);
	       		 $result[$i] = $tmp;
	       		 $i++;
	    		}
    	
	 }
	$stmt->close();
	return $result;
	

}

public function getItem($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`item` WHERE itemID=?;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("i",$this->itemID);
    $stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
 //	print "$rows";
 	$i = 0;
 	$result = array();
 	$stmt->bind_result($ritemID,$ruserID,$rdate,$rphoto,$rdetail,$rpasswd,$ritemTypeID,$radmincheck,$rsold);
 	//$value=$stmt->fetch_array(MYSQLI_ASSOC); 
 	$stmt->fetch();
		 		
		 	//	 print "adding : ".$ritemID;
	       		 $tmp = new item();
	       		 $tmp->setitemID($ritemID);
	       		// print "added :".$tmp->getItemID();
	       		 $tmp->setPasswd($rpasswd);
	       		 $tmp->setUserID($ruserID);
	       		 $tmp->setDate($rdate);
	       		 $tmp->setPhoto($rphoto);
	       		 $tmp->setDetail($rdetail);
	       		 $tmp->setItemTypeID($ritemTypeID);
	       		 $tmp->setAdmincheck($radmincheck);
	    		 $tmp->setSold($rsold);
    	
	 }
	$stmt->close();
	return $tmp;
	

}
public function getListType($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`item` WHERE itemTypeID=?;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("i",$this->itemTypeID);
    $stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
 	//print "$rows";
 	$i = 0;
 	$result = array();
 	$stmt->bind_result($ritemID,$ruserID,$rdate,$rphoto,$rdetail,$rpasswd,$ritemTypeID,$radmincheck,$rsold);
 	//$value=$stmt->fetch_array(MYSQLI_ASSOC); 
 	while ($stmt->fetch()) 
		 		{
		 	//	 print "adding : ".$ritemID;
	       		 $tmp = new item();
	       		 $tmp->setitemID($ritemID);
	       	//	 print "added :".$tmp->getItemID();
	       		 $tmp->setPasswd($rpasswd);
	       		 $tmp->setUserID($ruserID);
	       		 $tmp->setDate($rdate);
	       		 $tmp->setPhoto($rphoto);
	       		 $tmp->setDetail($rdetail);
	       		 $tmp->setItemTypeID($ritemTypeID);
	       		 $tmp->setAdmincheck($radmincheck);
       	$tmp->setSold($rsold);	   
	       		 $result[$i] = $tmp;
	       		 $i++;
	    		}
    	
	 }
	$stmt->close();
	return $result;
	

}

public function checkLogin($mysqli,$db_name)
{
		
	$sql = "SELECT userID FROM `$db_name`.`item` WHERE itemID=? AND passwd=?;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("ii",$this->itemID,$this->passwd);
	$stmt->execute();
	$stmt->store_result(); 
 	echo $rows = $stmt->num_rows;
 	$stmt->close();
	//$stmt->bind_result($result);
	//$stmt->fetch();
	if ($rows==0)
	return false;
	else
	return true;
	
}
public function checkOwner($mysqli,$db_name)
{
		
	$sql = "SELECT userID FROM `$db_name`.`item` WHERE itemID=? AND userID=?;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("is",$this->itemID,$this->userID);
	$stmt->execute();
	$stmt->store_result(); 
 	$rows = $stmt->num_rows;
 	$stmt->close();
	//$stmt->bind_result($result);
	//$stmt->fetch();
	if ($rows==0)
	return false;
	else
	return true;
	
}

}
?>