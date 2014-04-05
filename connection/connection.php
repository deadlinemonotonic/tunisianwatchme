<?php

class connection {

    private $username;
    private $password;
    private $hostname;
    private $bd;

    public function __construct() {
        $this->bd = "tunisianwatch";
        $this->hostname = "localhost";
        $this->password = "root";
        $this->username = "root";
        
    }
    
    public function connection(){
        mysql_connect($this->hostname, $this->username, $this->password) or die("Unable to connect to MySQL");
        $selectDB = mysql_select_db($this->bd) or die("Could not select the database");
        return $selectDB;
    }

}
$con=new connection();
$con->connection();
?>
