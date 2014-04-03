<?php

include_once("../connection/connection.php");
include_once("../entity/ReclamationEntity.php");
include_once("../entity/UtilisateurEntity.php");
include_once("../entity/DomaineEntity.php");
include_once("../entity/GeolocalistionEntity.php");
include_once("../entity/LieuEntity.php");

class reclamationDao {

    function __construct() {
        
    }

    function getALL() {
        $query_search = "SELECT * FROM reclamation";
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

    function getReclamationById($id) {
        $sql = "select * from reclamation where id = $id";
        $result = mysql_query($sql) or die(mysql_error());


        if ($result_array = mysql_fetch_array($result)) {

            $reclamation = new ReclamationEntity();
            $reclamation->setId($result_array["id"]);
            $reclamation->setTitre($result_array["titre"]);
            $reclamation->setDescription($result_array["description"]);
            $reclamation->setEtat($result_array["etat"]);
        }
        return $reclamation;
    }

    function insertReclamation($rec) {

        $date = $rec->getDate();
        $desc = $rec->getDescription();
        $etat = $rec->getEtat();
        $heure = $rec->getHeure();
        $cit = $rec->getCitoyen();
        $titre = $rec->getTitre();
        $dom = $rec->getdomaine();
        $geo = $rec->getGeolocalisation();
        $lieu = $rec->getlieu();

        $req = "INSERT INTO reclamation VALUES ('', $date, $heure,$titre,$cit->getId(),$dom->getId(),$etat,$geo->getId(),$lieu->getId())";
        $result = mysql_query($req) or die(mysql_error());
        if (mysql_query($result))
            echo "insertion réussie";
        else
            echo "erreur lors de l'insertion";
    }

    function updateReclamation($id, $rec) {
        $date = $rec->getDate();
        $desc = $rec->getDescription();
        $etat = $rec->getEtat();
        $heure = $rec->getHeure();
        $cit = $rec->getCitoyen();
        $titre = $rec->getTitre();
        $dom = $rec->getdomaine();
        $geo = $rec->getGeolocalisation();
        $lieu = $rec->getlieu();
    }

    function deleteReclamation($id) {

        $requete = " delete from reclamation where id= '$id' ; ";

        if (mysql_query($requete)) {
            echo "Utilisateur supprimée";
        }
        else
            echo "erreur lors de la suppression";
    }

}

 $rec = new reclamationDao();
  echo "<br>";
  $rec->insertReclamation($rec->getReclamationById(1));
  $list = $rec->getALL();
  $dom = $rec->getReclamationById(1)->getDescription();
  echo "$dom<br>";
  foreach ($list as $item) {
  echo $item->getId()."<br>";
  } 
?>