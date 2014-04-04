<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../connection/connection.php';
include_once '../entity/GeolocalistionEntity.php';

class GeolocalisationDAO {

    public function __construct() {
        $c = new connection();
        $c->connection();
    }

    function Insert($geo) {
        //$geo = new GeolocalisationEntity();

        $req = "INSERT INTO geolocalisation ( lon , lat ) VALUES ( '" . $geo->Lon() . "','" . $geo->Lat() . "')";
        mysql_query($req) or die("********** Erreur d'ajoute **********<br>");
        echo "********** Ajout avec succés **********<br>";
    }

    function delete($geo) {
        //$geo = new GeolocalisationEntity();
        $req = "DELETE FROM geolocalisation WHERE lon =  '" . $geo->getLon() . "' and lat = '" . $geo->getLat() . "'";
        mysql_query($req) or die("********** Erreur de suprission **********<br>");
        echo "********** Supprission avec succés **********<br>";
    }

    function update($geo) {
        //$geo = new GeolocalisationEntity();
        $req = "UPDATE geolocalisation SET lon ='" . $geo->getLon() . "', lat ='" . $geo->getLon() . "' WHERE id ='" . $geo->getId() . "'";
        mysql_query($req) or die("********** Erreur de mise à jour **********<br>");
        echo "********** Mise à jour avec succés **********<br>";
    }

    function AfficheAllGeo() {

        $result = mysql_query("SELECT * FROM geolocalisation");
        $list[] = array();

        while ($row = mysql_fetch_array($result)) {
            $geo = new GeolocalisationEntity();
            $geo->setId($row['id']);
            $geo->setLat($row['lat']);
            $geo->setLon($row['lon']);
            $list[] = $geo;
        }
        return $list;
    }

}

$dao = new GeolocalisationDAO();
$entity = new GeolocalisationEntity();
$list = $dao->AfficheAllGeo();

foreach ($list as $entity) {
    echo "lat:" . $entity->getLat() . " lon:" . $entity->getLon() . "<br>";

    $req = "INSERT INTO geolocalisation ( lon , lat ) VALUES ( " . $geo->getLon() . "," . $geo->getLat() . ")";
    mysql_query($req) or die("********** Erreur d'ajoute **********<br>");
    echo "********** Ajout avec succés **********<br>";
}


$dao = new GeolocalisationDAO();
$entity = new GeolocalisationEntity();
$geo = new GeolocalisationEntity();

//$geo->setLat("12121121212");
//$geo->setLon("45454545454");
//$dao->update(2, $geo);
//
$list = $dao->getAll();


foreach ($list as $entity) {
    echo $entity . "<br>";
}

