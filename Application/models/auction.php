<?php

class auction {

    public $auctionID;
    public $itemID;
    private $startdate;
    private $enddate;
    private $type;
    private $maxprice;
    private $minprice;
    private $end;
    private $allow;
    private $resttime;
    private $started;
    private $itemType;

    //set

    public function setAllow($allow) {
        $this->allow = $allow;
    }

    public function setStarted($started) {
        $this->started = $started;
    }

    public function getStarted() {
        return $this->started;
    }

    public function setItemTypeID($itemType) {
        $this->itemType = $itemType;
    }

    public function setResttime($allow) {
        $this->resttime = $allow;
    }

    public function getResttime() {
        return $this->resttime;
    }

    public function getAllow() {
        return $this->allow;
    }

    public function setAuctionID($auctionID) {
        $this->auctionID = $auctionID;
    }

    public function setItemID($itemID) {
        $this->itemID = $itemID;
    }

    public function setStartdate($startdate) {
        $this->startdate = $startdate;
    }

    public function setEnddate($enddate) {
        $this->enddate = $enddate;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setMinprice($minprice) {
        $this->minprice = $minprice;
    }

    /* 	public function setMaxprice($maxprice)
      {
      $this->maxprice=$maxprice;
      } */

    public function setEnd($end) {
        $this->end = $end;
    }

    //get
    public function getAuctionID() {
        return $this->auctionID;
    }

    public function getItemID() {
        return $this->itemID;
    }

    public function getStartdate() {
        return $this->startdate;
    }

    public function getEnddate() {
        return $this->enddate;
    }

    public function getType() {
        return $this->type;
    }

    public function getMinprice() {
        return $this->minprice;
    }

    /* 	public function getMaxprice()
      {
      return $this->maxprice;
      } */

    public function getEnd() {
        return $this->end;
    }

    //data function 

    public function getList($mysqli, $db_name) {

        $sql = "SELECT * FROM `$db_name`.`auction` WHERE end=0;";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //	print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($rauction, $ritemID, $rstartdate, $renddate, $rtype, $rminprice, $rend, $rallow, $rstarted);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new auction();

                // print "added :".$tmp->getUserID();
                $tmp->setAuctionID($rauction);
                $tmp->setItemID($ritemID);
                $tmp->setStartDate($rstartdate);
                $tmp->setEnddate($renddate);
                $tmp->setType($rtype);
                //$tmp->setMinprice($rminprice);
                $tmp->setMinprice($rminprice);
                $tmp->setEnd($rend);
                $tmp->setAllow($rallow);
                $tmp->setStarted($rstarted);
                //	 $tmp->setStarted($rstarted);
                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
    }

    public function getListEnd($mysqli, $db_name) {
        $sql = "SELECT * FROM `$db_name`.`auction` WHERE end=1;";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($rauction, $ritemID, $rstartdate, $renddate, $rtype, $rminprice, $rend, $rallow, $rstarted);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new auction();

                // print "added :".$tmp->getUserID();
                $tmp->setAuctionID($rauction);
                $tmp->setItemID($ritemID);
                $tmp->setStartDate($rstartdate);
                $tmp->setEnddate($renddate);
                $tmp->setType($rtype);
                //$tmp->setMinprice($rminprice);
                $tmp->setMinprice($rminprice);
                $tmp->setEnd($rend);
                $tmp->setAllow($rallow);
                $tmp->setStarted($rstarted);
                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
    }

    public function getAuction($mysqli, $db_name) {
        $result = new auction();
        if (date('H') == "00") {
            $date = date('Y-m-' . (date('d') - 1) . ' ' . '23' . ':i:s');
        }
        else
            $date = date('Y-m-d ' . (date('H') - 1) . ':i:s');

        $sql = "SELECT * FROM `$db_name`.`auction` WHERE auctionID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $this->auctionID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            $stmt->bind_result($rauction, $ritemID, $rstartdate, $renddate, $rtype, $rminprice, $rend, $rallow, $rstarted);
            $stmt->fetch();
            $result = new auction();
            $result->setAuctionID($rauction);
            $result->setItemID($ritemID);
            $result->setStartDate($rstartdate);
            $result->setEnddate($renddate);
            $result->setResttime(strtotime($renddate) - strtotime($date));
            $result->setType($rtype);
            $result->setMinprice($rminprice);
            $result->setEnd($rend);
            $result->setAllow($rallow);
            $result->setStarted($rstarted);
        }
        $stmt->close();
        return $result;
    }

    public function getAuctionByItemID($mysqli, $db_name) {
        $sql = "SELECT * FROM `$db_name`.`auction` WHERE itemID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $this->itemID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {

            $stmt->bind_result($rauction, $ritemID, $rstartdate, $renddate, $rtype, $rminprice, $rend, $rallow, $rstarted);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            $stmt->fetch();

            //print "adding : ".$ruserID;
            $tmp = new auction();

            // print "added :".$tmp->getUserID();
            $tmp->setAuctionID($rauction);
            $tmp->setItemID($ritemID);
            $tmp->setStartDate($rstartdate);
            $tmp->setEnddate($renddate);
            $tmp->setType($rtype);
            //$tmp->setMinprice($rminprice);
            $tmp->setMinprice($rminprice);
            $tmp->setEnd($rend);
            $tmp->setAllow($rallow);
            $tmp->setStarted($rstarted);
            $stmt->close();
            return $tmp;
        }
    }

    public function getAuctionRunning($mysqli, $db_name) {
        if (date('H') == "00") {
            $date = date('Y-m-' . (date('d') - 1) . ' ' . '23' . ':i:s');
        }
        else
            $date = date('Y-m-d ' . (date('H') - 1) . ':i:s');

        $sql = "SELECT * FROM `$db_name`.`auction` WHERE startdate<? AND enddate>?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $date, $date);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //print $rows;
            $i = 0;
            $result = array();
            $stmt->bind_result($rauction, $ritemID, $rstartdate, $renddate, $rtype, $rminprice, $rend, $rallow, $rstarted);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new auction();

                //print "adding : ".$ruserID;
                $tmp = new auction();

                // print "added :".$tmp->getUserID();
                $tmp->setAuctionID($rauction);
                $tmp->setItemID($ritemID);
                $tmp->setStartDate($rstartdate);
                $tmp->setEnddate($renddate);
                $tmp->setResttime(strtotime($renddate) - strtotime($date));
                $tmp->setType($rtype);
                //$tmp->setMinprice($rminprice);
                $tmp->setMinprice($rminprice);
                $tmp->setEnd($rend);
                $tmp->setAllow($rallow);
                $tmp->setStarted($rstarted);
                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
        //$tmp->setStarted($rstarted);       		
    }

    public function getAuctionRunningByItemType($mysqli, $db_name) {
        if (date('H') == "00") {
            $date = date('Y-m-' . (date('d') - 1) . ' ' . '23' . ':i:s');
        }
        else
            $date = date('Y-m-d ' . (date('H') - 1) . ':i:s');
        $sql = "SELECT * FROM `$db_name`.`auction` WHERE startdate<? AND enddate>? AND itemID IN(SELECT itemID FROM `$db_name`.`item` WHERE itemTypeID=?);";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssi", $date, $date, $this->itemType);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //print $rows;
            $i = 0;
            $result = array();
            $stmt->bind_result($rauction, $ritemID, $rstartdate, $renddate, $rtype, $rminprice, $rend, $rallow, $rstarted);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new auction();

                //print "adding : ".$ruserID;
                $tmp = new auction();

                // print "added :".$tmp->getUserID();
                // print $rauction;
                $tmp->setAuctionID($rauction);
                $tmp->setItemID($ritemID);
                // print $ritemID;
                $tmp->setStartDate($rstartdate);
                $tmp->setEnddate($renddate);
                $tmp->setResttime(strtotime($renddate) - strtotime($date));
                $tmp->setType($rtype);
                //$tmp->setMinprice($rminprice);
                $tmp->setMinprice($rminprice);
                $tmp->setEnd($rend);
                $tmp->setAllow($rallow);
                $tmp->setStarted($rstarted);
                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
        //$tmp->setStarted($rstarted);       		
    }

    public function getAuctionEnd($mysqli, $db_name) {
        $result = new auction();
        if (date('H') == "00") {
            $date = date('Y-m-' . (date('d') - 1) . ' ' . '23' . ':i:s');
        }
        else
            $date = date('Y-m-d ' . (date('H') - 1) . ':i:s');
        $sql = "SELECT * FROM `$db_name`.`auction` WHERE enddate<?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //print $rows;
            $i = 0;
            $result = array();
            $stmt->bind_result($rauction, $ritemID, $rstartdate, $renddate, $rtype, $rminprice, $rend, $rallow, $rstarted);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                $tmp = new auction();
                $tmp->setAuctionID($rauction);
                $tmp->setItemID($ritemID);
                $tmp->setStartDate($rstartdate);
                $tmp->setEnddate($renddate);
                $tmp->setResttime(strtotime($renddate) - strtotime($date));
                $tmp->setType($rtype);
                //$tmp->setMinprice($rminprice);
                $tmp->setMinprice($rminprice);
                $tmp->setEnd($rend);
                $tmp->setAllow($rallow);
                $tmp->setStarted($rstarted);
                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
        //$tmp->setStarted($rstarted);       		
    }

    public function getIsset($mysqli, $db_name) {
        $sql = "SELECT * FROM `$db_name`.`auction` WHERE itemID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $this->itemID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0)
            return true;
        else
            return false;
    }

    public function update($mysqli, $db_name) {

        if (isset($this->startdate)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`auction` SET startdate=? WHERE auctionID=?;");
            $stmt->bind_param("si", $this->startdate, $this->auctionID);
            $stmt->execute();
            $stmt->close();
        }

        if (isset($this->enddate)) {
            $stmt = $mysqli->prepare("SELECT ADDTIME((SELECT startdate from `$db_name`.`auction` WHERE auctionID=?),'0 00:30:00') AS endtime;");
            $stmt->bind_param("s", $this->auctionID);
            $stmt->execute();
            $tmp = $stmt->store_result();
            //$stmt->fetch();
            $rows = $stmt->num_rows;
            if ($rows != 0) {

                $stmt->bind_result($rendtime);
                //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
                $stmt->fetch();

                $stmt2 = $mysqli->prepare("UPDATE `$db_name`.`auction` SET enddate=? WHERE auctionID=?;");
                $stmt2->bind_param("ss", $rendtime, $this->auctionID);
                $stmt2->execute();
                $stmt2->close();
                //print "adding : ".$ruserID;        
            }
            $stmt->close();
        }
        if (isset($this->type)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`auction` SET type=? WHERE auctionID=?;");
            $stmt->bind_param("ii", $this->type, $this->auctionID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->minprice)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`auction` SET minprice=? WHERE auctionID=?;");
            $stmt->bind_param("ii", $this->minprice, $this->auctionID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->end)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`auction` SET end=? WHERE auctionID=?;");
            $stmt->bind_param("ii", $this->end, $this->auctionID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->allow)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`auction` SET allow=? WHERE auctionID=?;");
            $stmt->bind_param("ii", $this->allow, $this->auctionID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->started)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`auction` SET started=? WHERE auctionID=?;");
            $stmt->bind_param("ii", $this->started, $this->auctionID);
            $stmt->execute();
            $stmt->close();
        }
    }

    public function add($mysqli, $db_name) {
        $stmt = $mysqli->prepare("INSERT INTO `$db_name`.`auction` (`auctionID`, `itemID`, `startdate`, `enddate`, `type`, `minprice`, `end`, `allow`, `started`) VALUES (0, ?, ?, ?, ?,?,0,0,0);");
//print "prepare : "."INSERT INTO `$db_name`.`users` (`userID`, `passwd`, `name`, `sex` ,`email`, `phone`) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt->bind_param("iiiii", $this->itemID, $this->startdate, $this->enddate,$this->type, $this->minprice);
//print "bind param :"."sssisi".$this->userID.$this->passwd.$this->name.$this->sex.$this->email.$this->phone;
        $stmt->execute();
        $stmt->close();
    }

    public function delete($mysqli, $db_name) {
//print "adding ";
        $stmt = $mysqli->prepare("DELETE FROM `$db_name`.`auction` WHERE auctionID=? AND itemID=?;");
//print "prepare : "."INSERT INTO `$db_name`.`users` (`userID`, `passwd`, `name`, `sex` ,`email`, `phone`) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt->bind_param("ii", $this->auctionID, $this->itemID);
//print "bind param :"."sssisi".$this->userID.$this->passwd.$this->name.$this->sex.$this->email.$this->phone;
        $stmt->execute();
        $stmt->close();
    }

    public function getIssetAuctionByItemID($mysqli, $db_name) {
        $sql = "SELECT * FROM `$db_name`.`auction` WHERE itemID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $this->itemID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            return true;
        }
        else
            return false;
    }

}

?>