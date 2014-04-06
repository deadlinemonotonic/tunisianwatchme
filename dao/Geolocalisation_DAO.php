<?php

include_once 'connection/connection.php';
include_once 'entity/GeolocalistionEntity.php';

class GeolocalisationDAO {

    public function __construct() {
        
    }

    function Insert(GeolocalisationEntity $geo) {
        //$geo = new GeolocalisationEntity();

        $req = "INSERT INTO geolocalisation ( lon , lat ) VALUES ( '" . $geo->getLon() . "','" . $geo->getLat() ."')";
        $id = mysql_query($req) or die("********** Erreur d'ajoute **********<br>");
        echo "********** Ajout avec succés **********<br>";
        return mysql_insert_id();
    }

    function delete($id) {
        //$geo = new GeolocalisationEntity();
        $req = "DELETE FROM geolocalisation WHERE id = ".$id;
        mysql_query($req) or die("********** Erreur de suprission **********<br>");
        echo "********** Supprission avec succés **********<br>";
    }

    function update(GeolocalisationEntity $geo) {
        //$geo = new GeolocalisationEntity();
        $req = "UPDATE geolocalisation SET lon ='" . $geo->getLon() . "', lat ='" . $geo->getLon() . "', idreclamation='". $geo->getIdreclamation() ."' WHERE id ='" . $geo->getId() . "'";
        echo $req;
        mysql_query($req) or die("********** Erreur de mise à jour **********<br>");
        echo "********** Mise à jour avec succés **********<br>";
    }

    function getGeoByIdReclamation($idreclamation) {

        $result = mysql_query("SELECT * FROM geolocalisation where idreclamation=".$idreclamation);
        $list = array();
        $geo = null;
        if ($row = mysql_fetch_array($result)) {
            $geo = new GeolocalisationEntity();
            $geo->setId($row['id']);
            $geo->setLat($row['lat']);
            $geo->setLon($row['lon']);
        }
        return $geo;
    }
    
    function getGeoById($id){
        $result = mysql_query("SELECT * FROM geolocalisation where id = $id");
        
        $geo =null;
        if ($row = mysql_fetch_array($result)) {
            $geo = new GeolocalisationEntity();
            $geo->setId($row['id']);
            $geo->setLat($row['lat']);
            $geo->setLon($row['lon']);
        }
        return $geo;
    }
}

?>