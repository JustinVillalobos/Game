<?php
require("Model.php");
require("../data/db.php");
Class UserModel Extends Model {
    public function parameter()
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("SELECT * from parameters where description ='endEvent' ");
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        $db->close();
        if(is_null($row)){
            return true;
        }
        return $row;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function getRanking()
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("SELECT u.name,u.email,r.date,r.value FROM ranking r INNER JOIN user u on r.idUser = u.idUser order by 4,3 asc;");
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all();
        $stmt->close();
        $db->close();
        if(is_null($rows)){
            return true;
        }
        return $rows;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function getTop10()
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("SELECT u.nick,u.email,r.date,r.value FROM ranking r INNER JOIN user u on r.idUser = u.idUser order by 4,3 asc limit 10;");
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all();
        $stmt->close();
        $db->close();
        if(is_null($rows)){
            return true;
        }
        return $rows;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function login($auth)
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("SELECT idUser,role FROM user WHERE email = ? and password = ?;");
        $stmt->bind_param("ss", $auth["email"] ,  $auth["password"]);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        $db->close();
        if(is_null($row)){
            return true;
        }
        return $row;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function getNick($auth)
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("SELECT idUser,role FROM user WHERE nick = ?;");
        $stmt->bind_param("s", $auth["nick"]);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        $db->close();
        if(is_null($row)){
            return true;
        }
        return $row;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function getUserAdmin(){
        try {
            //write your logic
            $db = new DB();
            $conn = $db->getConnstring();
    
            // Preparation of prepared statements
            $stmt = $conn->prepare("SELECT email,password FROM user WHERE role = 1");
            $stmt->execute();
            $row = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            $db->close();
            if(is_null($row)){
                return true;
            }
            return $row;
            } catch (\ErrorException  $e) {
                return false;
            }
    }
    public function updateCredentials($user){
        try {
            //write your logic
            $db = new DB();
            $conn = $db->getConnstring();
    
            // Preparation of prepared statements
            $stmt = $conn->prepare("UPDATE user set email =?, password=? where role = 1;");
            $stmt->bind_param("ss",$user["email"] ,  $user["password"]);
            $stmt->execute();
            $stmt->close();
            $db->close();
            return true;
            return $row;
            } catch (\ErrorException  $e) {
                return false;
            }
    }
    public function saveData($user)
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("INSERT INTO user(name,email,password,nick,role) values(?,?,?,?,2)");
        $stmt->bind_param("ssss",$user["name"], $user["email"] ,  $user["password"],  $user["nick"]);
        $stmt->execute();
        $stmt->close();
        $db->close();
        return true;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function getPoints($data)
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("SELECT value FROM ranking WHERE idUser = ? limit 1;");
        $stmt->bind_param("s", $data["idUser"]);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        $db->close();
        if(is_null($row)){
            return true;
        }
        return $row;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function savePoints($data)
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("INSERT INTO ranking(value,idUser,date) values(?,?,NOW())");
        $stmt->bind_param("ii",$data["score"], $data["idUser"] );
        $stmt->execute();
        $stmt->close();
        $db->close();
        return true;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function updatePoints($data)
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("UPDATE  ranking set value= ?, date =NOW() where idUser =?;");
        $stmt->bind_param("ii",$data["score"], $data["idUser"] );
        $stmt->execute();
        $stmt->close();
        $db->close();
        return true;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function saveNewDate($data)
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("UPDATE parameters set value =? where idParameter =1");
        $stmt->bind_param("s",$data["date"] );
        $stmt->execute();
        $stmt->close();
        $db->close();
        return true;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    public function deleteAll()
    {
        try {
        //write your logic
        $db = new DB();
        $conn = $db->getConnstring();

        // Preparation of prepared statements
        $stmt = $conn->prepare("DELETE from ranking where idUser>0;");
        $stmt->execute();
        $stmt->close();
        $db->close();
        return true;
        } catch (\ErrorException  $e) {
            return false;
        }
    }
    
    protected function insertData($data) {
        try {
        //write your logic
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>