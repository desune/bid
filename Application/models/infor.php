<?php
class infor{
	private $attribute;
	private $value;
	
	public function setAttribute($attribute)
	{
		$this->attribute=$attribute;
	}
	public function setValue($value)
	{
		$this->value=$value;
	}
	public function getAttribute()
	{
		return $this->attribute;
	}
	public function getValue()
	{
		return $this->value;
	}
	
	//data
	
	public function getInfor($mysqli,$db_name)
	{
		$sql = "SELECT * FROM `$db_name`.`infor` WHERE attribute=?;";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("s",$this->attribute);
	$stmt->execute();
	$tmp=$stmt->store_result();
	//$stmt->fetch();
	$rows = $stmt->num_rows;
 	if($rows != 0)
 	{
 	
 	$stmt->bind_result($rattribute,$rvalue);
 	//$value=$stmt->fetch_array(MYSQLI_ASSOC); 
 	$stmt->fetch(); 

		 		//print "adding : ".$ruserID;
        $tmp = new infor();
	       		
       // print "added :".$tmp->getUserID();
       $tmp->setAttribute($rattribue);
       $tmp->setValue($rvalue);
        	
		$stmt->close();
		return $tmp;
		}	
	}
public function add($mysqli,$db_name)
{
	 
//print "adding ";
$stmt = $mysqli->prepare("INSERT INTO `$db_name`.`infor` VALUES (?, ?);");
$stmt->bind_param("si",$this->attribute,$this->value);
$stmt->execute();
$stmt->close();
	
}
}

?>