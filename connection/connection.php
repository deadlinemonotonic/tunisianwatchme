<?php

class connection {

    private $username;
    private $password;
    private $hostname;
    private $bd;

    public function __construct() {
        $this->bd = "tunisianwatch";
        $this->hostname = "root";
        $this->password = "root";
        $this->username = "localhost";
        
    }
    
    public function connection(){
        $dbhandle = mysql_connect($this->hostname, $this->username, $this->password) or die("Unable to connect to MySQL");
        $selectDB = mysql_select_db($this->bd, $dbhandle) or die("Could not select the database");
        return $selectDB;
    }

}

?>
