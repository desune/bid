<?php
class auctionresult{
	private $auctionID;

	private $endprice;
	private $winner;
	
	//set

	public function setAuctionID($value)
	{
		$this->auctionID=$value;
	}
	
	public function setEndprice($value)
	{
		$this->endprice=$value;	
	}
	
	public function setWinner($value)
	{
		$this->winner=$value;
		
	}
	
	//get
	
	public function getAuctionID()
	{
		return $this->auctionID;
		
	}
	

	
	public function getEndprice()
	{
		return $this->endprice;
		
	}
	
	public function getWinner()
	{
		return $this->winner;
		
	}
	
	//data function
	
public function getList($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`auctionresult`";
    $stmt = $mysqli->prepare($sql); 
	$stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
 		//print "$rows";
 	$i = 0;
 	$result = array();
 	$stmt->bind_result($rauctionID,$rendprice,$rwinner);
 	//$value=$stmt->fetch_array(MYSQLI_ASSOC); 
 	while ($stmt->fetch()) 
		 		{
		 		//print "adding : ".$ruserID;
	       		 $tmp = new auctionresult();
	       		
	       		// print "added :".$tmp->getUserID();
	       		 $tmp->setAuctionID($rauctionID);
	       		 $tmp->setEndprice($rendprice);
	       		 $tmp->setWinner($rwinner);
	       		 //$tmp->setMinprice($rminprice);
	       		 $result[$i] = $tmp;
	       		 $i++;
	    		}
    	
	 }
	$stmt->close();
	return $result;
	

}

public function getListWinner($mysqli,$db_name)
{
	$sql = "SELECT * FROM `$db_name`.`auctionresult` WHERE winner=?";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("s",$this->winner);
	$stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
 		print "$rows";
 	$i = 0;
 	$result = array();
 	$stmt->bind_result($rauctionID,$rendprice,$rwinner);
 	//$value=$stmt->fetch_array(MYSQLI_ASSOC); 
 	while ($stmt->fetch()) 
		 		{
		 		//print "adding : ".$ruserID;
	       		 $tmp = new auctionresult();
	       		
	       		// print "added :".$tmp->getUserID();
	       		 $tmp->setAuctionID($rauctionID);
	      
	       		 $tmp->setEndprice($rendprice);
	       		 $tmp->setWinner($rwinner);
	       		 //$tmp->setMinprice($rminprice);
	       		 $result[$i] = $tmp;
	       		 $i++;
	    		}
    	
	 }
	$stmt->close();
	return $result;
	

}

public function add($mysqli,$db_name){  
//print "adding ";
$stmt = $mysqli->prepare("INSERT INTO `$db_name`.`auctionresult` (`auctionID`, `endprice`, `winner`) VALUES (?, ?, ?);");
//print "prepare : "."INSERT INTO `$db_name`.`users` (`userID`, `passwd`, `name`, `sex` ,`email`, `phone`) VALUES (?, ?, ?, ?, ?, ?);";
$stmt->bind_param("isis",$this->auctionID,$this->endprice,$this->winner);
//print "bind param :"."sssisi".$this->userID.$this->passwd.$this->name.$this->sex.$this->email.$this->phone;
$stmt->execute();
$stmt->close();

}
}

?>