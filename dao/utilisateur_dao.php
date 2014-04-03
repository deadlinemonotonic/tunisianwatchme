<?php

include_once("../connection/connection.php");
include_once("../entity/ReclamationEntity.php");

class utilisateurDao {

    function __construct() {
        
    }

    function getALL() {
        $query_search = "SELECT * FROM utilisateur";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();
        while ($result_array = mysql_fetch_array($query_exec)) {
            $reclamation = new ReclamationEntity();
            $reclamation->setId($result_array["id"]);
            $reclamation->setTitre($result_array["titre"]);
            $reclamation->setDescription($result_array["description"]);
            $reclamation->setEtat($result_array["etat"]);
            $list[] = $reclamation;
        }
        return $list;
    }

}

$rec = new reclamationDao();
$list = $rec->getALL();
foreach ($list as $item) {
    echo $item->getId()."<br>";
}
?>