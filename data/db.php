<?php
Class DB{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "db_game";
    var $conn;
    function getConnstring() {
        $this->conn = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname);
        
        /* check connection */
        if ( $this->conn -> connect_errno) {
            echo "Failed to connect to MySQL: " .  $this->conn -> connect_error;
            exit();
          }
        return $this->conn;
    }
    function close(){
        mysqli_close( $this->conn);
    }
}
  
?>