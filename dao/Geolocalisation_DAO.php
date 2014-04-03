<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../connection/connection.php';
include_once '../entity/GeolocalistionEntity.php';

class GeolocalisationDAO {
    

    function Insert($lon,$lat) {
        
        $req = "INSERT INTO basev ( lon , lat ) VALUES ( '" . $Lon . "','" . $Lat . "')";
        mysql_query($req) or die("********** Erreur d'ajoute **********<br>");
        echo "********** Ajout avec succés **********<br>";
    }

}
