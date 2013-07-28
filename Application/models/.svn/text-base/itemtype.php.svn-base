<?php

class itemtype {

    private $itemTypeID;
    private $name;

//set get

    public function setName($name) {
        $this->name = $name;
    }

    public function setItemTypeID($itemTypeID) {
        $this->itemTypeID = $itemTypeID;
    }

    public function getItemTypeID() {
        return $this->itemTypeID;
    }

    public function getName() {
        return $this->name;
    }

//data function
    public function getTypeIDbyTypeName($mysqli, $db_name) {
        $sql = "SELECT itemTypeID FROM `$db_name`.`itemtype` WHERE name=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $this->name);
        $stmt->execute();
        $tmp = $stmt->store_result();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            $stmt->bind_result($ritemTypeID);
            $stmt->fetch();
            $result = new itemtype();
            $result->setItemTypeID($ritemTypeID);
        }
        $stmt->close();
        return $result;
    }

    public function getList($mysqli, $db_name) {
        $sql = "SELECT * FROM `$db_name`.`itemtype`;";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($ritemTypeID, $rname);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //print "adding : ".$ruserID;
                $tmp = new itemtype();
                $tmp->setItemTypeID($ritemTypeID);
                $tmp->setName($rname);
                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
    }

    public function update($mysqli, $db_name) {


        $stmt = $mysqli->prepare("UPDATE `$db_name`.`itemtype` SET name=? WHERE itemTypeID=?;");
        $stmt->bind_param("ii", $this->name, $this->itemTypeID);
        $stmt->execute();
        $stmt->close();
    }

    public function add($mysqli, $db_name) {

//print "adding ";
        $stmt = $mysqli->prepare("INSERT INTO `$db_name`.`itemtype` VALUES (0, ?);");
        $stmt->bind_param("i", $this->name);
        $stmt->execute();
        $stmt->close();
    }

}

?>