<?php

//print "include users.php next()";
class users {

//attributes variable
    public $userID;
    private $passwd;
    private $admin;
    private $name;
    private $sex;
    private $email;
    private $birthday;
    private $phone;
    private $amount;
    private $delete;
//result variable
    private $list;
    private $user;

//all get function :
    public function getUserID() {
        return $this->userID;
    }

    public function getPasswd() {
        return $this->passwd;
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function getName() {
        return $this->name;
    }

    public function getSex() {
        return $this->sex;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getDelete() {
        return $this->delete;
    }

//public function getList()
//{
//return $this->list;
//}
//public function getUser()
//{
//return $this->user;
//}
//all set function :
    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function setPasswd($passwd) {
        $this->passwd = md5($passwd);
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSex($sex) {
        $this->sex = $sex;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setDelete($delete) {
        $this->delete = $delete;
    }

//data function :

    public function add($mysqli, $db_name) {
//print "adding ";
        $stmt = $mysqli->prepare("INSERT INTO `$db_name`.`users` (`userID`, `passwd`, `name`, `sex` ,`email`, `phone`) VALUES (?, ?, ?, ?, ?, ?);");
//print "prepare : "."INSERT INTO `$db_name`.`users` (`userID`, `passwd`, `name`, `sex` ,`email`, `phone`) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt->bind_param("sssisi", $this->userID, $this->passwd, $this->name, $this->sex, $this->email, $this->phone);
//print "bind param :"."sssisi".$this->userID.$this->passwd.$this->name.$this->sex.$this->email.$this->phone;
        $stmt->execute();
        $stmt->close();
//print "<BR>Insert success!!!<BR>";
        if (isset($this->admin)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET admin=? WHERE userID=?;");
            $stmt->bind_param("is", $this->admmin, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->birthday)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET birthday=? WHERE userID=?;");
            $stmt->bind_param("ss", $this->birthday, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->amount)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET amount=? WHERE userID=?;");
            $stmt->bind_param("is", $this->amount, $this->userID);
            $stmt->execute();
            $stmt->close();
        }

        if (isset($this->delete)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET delete=? WHERE userID=?;");
            $stmt->bind_param("is", $this->delete, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
    }

//public function addUser($mysqli,$db_name,userID,passwd,$this->name,$this->sex,$this->email,$this->phone);)

    public function update($mysqli, $db_name) {

        if (isset($this->passwd)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET passwd=? WHERE userID=?;");
            $stmt->bind_param("ss", $this->passwd, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->name)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET name=? WHERE userID=?;");
            $stmt->bind_param("ss", $this->name, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->sex)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET sex=? WHERE userID=?;");
            $stmt->bind_param("is", $this->sex, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->email)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET email=? WHERE userID=?;");
            $stmt->bind_param("ss", $this->email, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->phone)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET phone=? WHERE userID=?;");
            $stmt->bind_param("is", $this->phone, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->admin)) {
            //	print "update<BR>";
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET admin=? WHERE userID=?;");
            $stmt->bind_param("is", $this->admin, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->birthday)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET birthday=? WHERE userID=?;");
            $stmt->bind_param("ss", $this->birthday, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
        if (isset($this->amount)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET amount=? WHERE userID=?;");
            $stmt->bind_param("is", $this->amount, $this->userID);
            $stmt->execute();
            $stmt->close();
        }

        if (isset($this->delete)) {
            $stmt = $mysqli->prepare("UPDATE `$db_name`.`users` SET deleted=? WHERE userID=?;");
            $stmt->bind_param("is", $this->delete, $this->userID);
            $stmt->execute();
            $stmt->close();
        }
    }

    public function getList($mysqli, $db_name) {
        $result = new users();
        $sql = "SELECT * FROM `$db_name`.`users`;";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //	print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($ruserID, $rpasswd, $radmin, $rname, $rsex, $remail, $rbirthday, $rphone, $ramount, $rdelete);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //	print "adding : ".$ruserID;
                $tmp = new users();
                $tmp->setUserID($ruserID);
                // print "added :".$tmp->getUserID();
                $tmp->setPasswd($rpasswd);
                $tmp->setAdmin($radmin);
                $tmp->setName($rname);
                $tmp->setSex($rsex);
                $tmp->setEmail($remail);
                $tmp->setBirthday($rbirthday);
                $tmp->setPhone($rphone);
                $tmp->setAmount($ramount);
                $tmp->setDelete($rdelete);
                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
    }

    public function getListUndelete($mysqli, $db_name) {
        $result = new users();
        $sql = "SELECT * FROM `$db_name`.`users` WHERE deleted=0;";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $tmp = $stmt->store_result();
        //$stmt->fetch();
        $rows = $stmt->num_rows;
        if ($rows != 0) {
            //	print "$rows";
            $i = 0;
            $result = array();
            $stmt->bind_result($ruserID, $rpasswd, $radmin, $rname, $rsex, $remail, $rbirthday, $rphone, $ramount, $rdelete);
            //$value=$stmt->fetch_array(MYSQLI_ASSOC); 
            while ($stmt->fetch()) {
                //	print "adding : ".$ruserID;
                $tmp = new users();
                $tmp->setUserID($ruserID);
                // print "added :".$tmp->getUserID();
                $tmp->setPasswd($rpasswd);
                $tmp->setAdmin($radmin);
                $tmp->setName($rname);
                $tmp->setSex($rsex);
                $tmp->setEmail($remail);
                $tmp->setBirthday($rbirthday);
                $tmp->setPhone($rphone);
                $tmp->setAmount($ramount);
                $tmp->setDelete($rdelete);
                $result[$i] = $tmp;
                $i++;
            }
        }
        $stmt->close();
        return $result;
    }

    public function getUser($mysqli, $db_name) {
        $sql = "SELECT * FROM `$db_name`.`users` WHERE userID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $this->userID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ruserID, $rpasswd, $radmin, $rname, $rsex, $remail, $rbirthday, $rphone, $ramount, $rdelete);
        $stmt->fetch();
        $tmp = new users();
        $tmp->setUserID($ruserID);
        //  print "added :".$tmp->getUserID();
        $tmp->setPasswd($rpasswd);
        $tmp->setAdmin($radmin);
        $tmp->setName($rname);
        $tmp->setSex($rsex);
        $tmp->setEmail($remail);
        $tmp->setBirthday($rbirthday);
        $tmp->setPhone($rphone);
        $tmp->setAmount($ramount);
        $tmp->setDelete($rdelete);
        //$stmt->bind_result($this->user);
        //$stmt->fetch();
        $stmt->close();
        return $tmp;
    }

    public function isUser($mysqli, $db_name) {

        $sql = "SELECT userID FROM `$db_name`.`users` WHERE userID=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $this->userID);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        $stmt->close();
        //$stmt->bind_result($result);
        //$stmt->fetch();
        if ($rows == 0)
            return false;
        else
            return true;
    }

    public function checkLogin($mysqli, $db_name) {

        $sql = "SELECT userID FROM `$db_name`.`users` WHERE userID=? AND passwd=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $this->userID, $this->passwd);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        $stmt->close();
        //$stmt->bind_result($result);
        //$stmt->fetch();
        if ($rows == 0)
            return false;
        else
            return true;
    }

}

?>