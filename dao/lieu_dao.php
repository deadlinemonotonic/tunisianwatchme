<?php

include_once '../connection/connection.php';
include_once '../entity/LieuEntity.php';

class lieu_dao{
    
    function __construct() {
        
    }
    
    function getAll(){
        $sql = "select * from lieu";
        $result = mysql_query($sql) or die(mysql_error());
        $list = array();

        while ($row = mysql_fetch_array($result)) {

            $lieu = new LieuEntity();
            $lieu->setId($row['id']);
            $lieu->setVille($row['ville']);
            $list[] = $lieu;
        }
        return $list;
    }

}

$lieuDAO = new lieu_dao();
$lieuEntity = new LieuEntity();//optionnel
$listLieux = $lieuDAO->getAll();
foreach ($listLieux as $lieuEntity) {
    echo "lieu " . $lieuEntity->getId() . " " . $lieuEntity->getVille() . "<br>";
}