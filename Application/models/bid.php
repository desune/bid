<?php

class bid {

    private $bidID;
    private $auctionID;
    private $userID;
    private $price;
    private $time;

    //set

    public function setBidID($value) {
        $this->bidID = $value;
    }

    public function setAuctionID($value) {
        $this->auctionID = $value;
    }

    public function setUserID($value) {
        $this->userID = $value;
    }

    public function setPrice($value) {
        $this->price = $value;
    }

    public function setTime($value) {
        $this->time = $value;
    }

    //get

    public function getBidID() {
        return $this->bidID;
    }

    public function getAuctionID() {
        return $this->auctionID;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getTime() {
        return $this->time;
    }

    //data function

    public function add($mysqli, $db_name) {

        $stmt = $mysqli->prepare("INSERT INTO `$db_name`.`bid` (`bidID`, `auctionID`, `userID`, `price`, `time`) VALUES (0, ?, ?, ?, ?);");

        $stmt->bind_param("isis", $this->auctionID, $this->userID, $this->price, $this->time);
//print "bind param :"."sssisi".$this->userID.$this->passwd.$this->name.$this->sex.$this->email.$this->phone;
        $stmt->execute();
        $stmt->close();
    }

    public function getList($mysqli, $db_name) {
        $result = new bid();
        $sql = "SELECT * FROM `$db_name`.`bid`;";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //		print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($rbidID, $rauctionID, $ruserID, $rprice, $rtime);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new bid();

                // print "added :".$tmp->getUserID();
                $tmp->setbidID($rbidID);
                $tmp->setAuctionID($rauctionID);
                $tmp->setUserID($ruserID);
                $tmp->setPrice($rprice);
                //$tmp->setMinprice($rminprice);
                $tmp->setTime($rtime);

                $result[$i] = $tmp;
                $i++;
            }
        }else $result=null;
        $stmt->close();
        return $result;
    }

    public function getListUser($mysqli, $db_name) {
        $result = new bid();
        $sql = "SELECT * FROM `$db_name`.`bid` WHERE userID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $this->userID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($rbidID, $rauctionID, $ruserID, $rprice, $rtime);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new bid();

                // print "added :".$tmp->getUserID();
                $tmp->setbidID($rbidID);
                $tmp->setAuctionID($rauctionID);
                $tmp->setUserID($ruserID);
                $tmp->setPrice($rprice);
                //$tmp->setMinprice($rminprice);
                $tmp->setTime($rtime);

                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
    }

    public function getListAuctionByUser($mysqli, $db_name) {
        $result = new bid();
        $sql = "SELECT DISTINCT auctionID FROM `$db_name`.`bid` WHERE userID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $this->userID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($rauctionID);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new bid();

                // print "added :".$tmp->getUserID();

                $tmp->setAuctionID($rauctionID);

                //$tmp->setMinprice($rminprice);


                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
    }

    public function getListByAuction($mysqli, $db_name) {
        $result = new bid();
        $sql = "SELECT * FROM `$db_name`.`bid` WHERE auctionID=?  ORDER BY price;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $this->auctionID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //	print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($rbidID, $rauctionID, $ruserID, $rprice, $rtime);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new bid();

                // print "added :".$tmp->getUserID();
                $tmp->setbidID($rbidID);
                $tmp->setAuctionID($rauctionID);
                $tmp->setUserID($ruserID);
                $tmp->setPrice($rprice);
                //$tmp->setMinprice($rminprice);
                $tmp->setTime($rtime);

                $result[$i] = $tmp;
                $i++;
            }
        }else $result=null;
        $stmt->close();
        return $result;
    }

    public function getListUserByAuction($mysqli, $db_name) {
        $result = new bid();
        $sql = "SELECT DISTINCT userID FROM `$db_name`.`bid` WHERE auctionID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $this->auctionID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {

            $i = 0;
            $result = array();
            $stmt->bind_result($ruserID);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //	 			print $ruserID;
                //print "adding : ".$ruserID;
                $tmp = new bid();

                // print "added :".$tmp->getUserID();

                $tmp->setUserID($ruserID);

                $result[$i] = $tmp;
                $i++;
            }
        }else $result=null;
        $stmt->close();
        return $result;
    }

    public function getBidWinner($mysqli, $db_name) {
        $result = new bid();
        $sql1 = "SELECT MAX(price) FROM `$db_name`.`bid` WHERE auctionID=?";
        $stmt1 = $mysqli->prepare($sql1);
        $stmt1->bind_param("i", $this->auctionID);
        $stmt1->execute();
        $tmp = $stmt1->store_result();
        $rows = $stmt1->num_rows;
        if ($rows != 0) {
            $stmt1->bind_result($rprice);
            $stmt1->fetch();

            $result->setPrice($rprice);
        }else $result=null;
        $stmt1->close();
        $sql = "SELECT userID FROM `$db_name`.`bid` WHERE price=(SELECT MAX(price) FROM `$db_name`.`bid` WHERE auctionID=?);";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $this->auctionID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            $stmt->bind_result($ruserID);
            $stmt->fetch();
            $result->setUserID($ruserID);
        }else $result=null;
        $stmt->close();
        return $result;
    }

    public function issetBid($mysqli, $db_name) {
        $result = new bid();
        $sql = "SELECT * FROM `$db_name`.`bid` WHERE auctionID=? userID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("is", $this->auctionID, $this->userID);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //	print "$rows";
            return true;
        } else {
            return false;
        }
    }

}

?>