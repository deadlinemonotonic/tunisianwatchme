<?php

include_once 'parsing/reclamation_xmlparser.php';
if (isset($_GET["type"])) {
    if ($_GET["type"] == "select") {
        if (isset($_GET["id"])) {
            $xml = new ReclamationXMLParser($_GET["id"]);
        } else {
            $xml = new ReclamationXMLParser(0);
        }
    } else if ($_GET["type"] == "add") {
        if (isset($_GET['titre']) && isset($_GET['description']) && isset($_GET['date']) && isset($_GET['heure']) && isset($_GET['idcitoyen']) && isset($_GET['iddomaine']) && isset($_GET['etat']) && isset($_GET['idlieu'])) {
            $reclamation = new ReclamationEntity();
            $reclamation->setTitre($_GET['titre']);
            $reclamation->setDescription($_GET["description"]);
            $reclamation->setEtat($_GET["etat"]);
            $reclamation->setDate($_GET["date"]);
            $reclamation->setHeure($_GET["heure"]);
            if (isset($_GET["lon"]) && isset($_GET["lat"])) {
                $geolocalisation = new GeolocalisationEntity();
                $geolocalisation->setLat($_GET["lat"]);
                $geolocalisation->setLon($_GET["lon"]);
                $reclamation->setGeolocalisation($geolocalisation);
                $daoGeo = new GeolocalisationDAO();
                $idgeo = $daoGeo->Insert($geolocalisation);
                $reclamation->setGeolocalisation($idgeo);
            }
            $citoyen = new UtilisateurEntity();
            $citoyen->setId($_GET["idcitoyen"]);
            
            $lieu = new LieuEntity();
            $lieu->setId($_GET["idlieu"]);
            
            $domaine = new DomaineEntity();
            $domaine->setId($_GET["iddomaine"]);
            
            $reclamation->setCitoyen($citoyen);
            $reclamation->setlieu($lieu);
            $reclamation->setdomaine($domaine);
            $daoReclamation = new reclamationDao();
            $daoReclamation->insertReclamation($reclamation);
        }
    } else if($_GET["type"] == "delete"){
         if(isset($_GET['id'])) {
             $daoReclamation = new reclamationDao();
             $daoReclamation->deleteReclamation($_GET['id']);
         }
    }
}
?>