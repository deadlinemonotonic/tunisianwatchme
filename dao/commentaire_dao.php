<?php

/*include_once("../connection/connection.php");
include_once("../entity/CommentaireEntity.php");
include_once("../entity/UtilisateurEntity.php");

class commentaire_dao {

    function __construct() {
        
    }

    function getAll() {
        $sql = "select * from commentaire";
        $result = mysql_connect($sql) or die(mysql_error());
        $list = array();
        while ($row = mysqli_fetch_array($result)) {
            echo $row['FirstName'] . " " . $row['LastName'];
            echo "<br>";
            $comm = new CommentaireEntity();
            $comm->setDate($row['date']);
            $comm->setId($row['id']);
            $comm->setTexte($row['texte']);
            $usr=new UtilisateurEntity();
            $usr->set
            $comm->setUser($usr);
        }
    }

}*/

?>
