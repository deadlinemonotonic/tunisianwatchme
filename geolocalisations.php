<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'parsing/geolocalisationXmlparser.php';
if (isset($_GET["type"])) {
    if ($_GET["type"] == "select") {
        if (isset($_GET["id"])) {
            $c = new GeolocalisationXmlparser($_GET["id"]);
        }
    }
    else if($_GET["type"]=="add"){
        if(isset($_GET["lon"]) && isset($_GET["lat"])){
            $geolocalisation = new GeolocalisationEntity();
            $geolocalisation->setLat($_GET["lat"]);
            $geolocalisation->setLon($_GET["lon"]);
            $geoDao = new GeolocalisationDAO();
            $geoDao->Insert($geolocalisation);
        }
    }
}