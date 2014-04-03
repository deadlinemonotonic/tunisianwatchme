<?php

include_once '../connection/connection.php';
include_once '../entity/DomaineEntity.php';

class domaine_dao {

    function __construct() {
        
    }

    function getAll() {
        $sql = "select * from domaine";
        $result = mysql_query($sql) or die(mysql_error());
        $list = array();

        while ($row = mysql_fetch_array($result)) {

            $domm = new DomaineEntity();
            $domm->setId($row['id']);
            $domm->setNom($row['nom']);
            $list[] = $domm;
        }
        return $list;
    }

}

$domDAO = new domaine_dao();
$DomEntity = new DomaineEntity();//optionnel
$listDomaines = $domDAO->getAll();
foreach ($listDomaines as $DomEntity) {
    echo "domaine " . $DomEntity->getId() . " " . $DomEntity->getNom() . "<br>";
}

