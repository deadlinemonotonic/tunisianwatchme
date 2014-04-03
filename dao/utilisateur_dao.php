<?php

include_once("../connection/connection.php");
include_once("../entity/UtilisateurEntity.php");

class utilisateurDao {

    function __construct() {
        
    }

    function getALL() {
        $query_search = "SELECT * FROM utilisateur";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();
        while ($result_array = mysql_fetch_array($query_exec)) {
            $user = new UtilisateurEntity();
            $user->setId($result_array["id"]);
            $user->setNom($result_array["nom"]);
            $user->setPrenom($result_array["prenom"]);
            $user->setMail($result_array["mail"]);
            $list[] = $user;
        }
        return $list;
    }

}

$rec = new utilisateurDao();
$list = $rec->getALL();
foreach ($list as $item) {
    echo $item->getId()." - ".$item->getNom()." - ".$item->getPrenom()." - ".$item->getMail()."<br>";
}
?>