<?php

include_once 'connection/connection.php';
include_once 'entity/GeolocalistionEntity.php';

class GeolocalisationDAO {

    public function __construct() {
        
    }

    function Insert(GeolocalisationEntity $geo) {
        //$geo = new GeolocalisationEntity();

        $req = "INSERT INTO geolocalisation ( lon , lat ) VALUES ( '" . $geo->Lon() . "','" . $geo->Lat() . "')";
        $id = mysql_query($req) or die("********** Erreur d'ajoute **********<br>");
        echo "********** Ajout avec succés **********<br>";
        return $id;
    }

    function delete(GeolocalisationEntity $geo) {
        //$geo = new GeolocalisationEntity();
        $req = "DELETE FROM geolocalisation WHERE lon =  '" . $geo->getLon() . "' and lat = '" . $geo->getLat() . "'";
        mysql_query($req) or die("********** Erreur de suprission **********<br>");
        echo "********** Supprission avec succés **********<br>";
    }

    function update(GeolocalisationEntity $geo) {
        //$geo = new GeolocalisationEntity();
        $req = "UPDATE geolocalisation SET lon ='" . $geo->getLon() . "', lat ='" . $geo->getLon() . "' WHERE id ='" . $geo->getId() . "'";
        mysql_query($req) or die("********** Erreur de mise à jour **********<br>");
        echo "********** Mise à jour avec succés **********<br>";
    }

    function AfficheAllGeo() {

        $result = mysql_query("SELECT * FROM geolocalisation");
        $list = array();

        while ($row = mysql_fetch_array($result)) {
            $geo = new GeolocalisationEntity();
            $geo->setId($row['id']);
            $geo->setLat($row['lat']);
            $geo->setLon($row['lon']);
            $list[] = $geo;
        }
        return $list;
    }

    function getGeoById($id) {
        $result = mysql_query("SELECT * FROM geolocalisation where id = $id");

        $geo = new GeolocalisationEntity();
        if ($row = mysql_fetch_array($result)) {

            $geo->setId($row['id']);
            $geo->setLat($row['lat']);
            $geo->setLon($row['lon']);
            $list[] = $geo;
        }
        return $geo;
    }

}

?>
