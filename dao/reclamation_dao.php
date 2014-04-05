<?php

include_once("../connection/connection.php");
include_once("../entity/ReclamationEntity.php");
include_once("../dao/utilisateur_dao.php");
include_once("../dao/domaine_dao.php");
include_once("../dao/Geolocalisation_DAO.php");
include_once("../dao/lieu_dao.php");

class reclamationDao {

    function __construct() {
        
    }

    function getALL() {
        $query_search = "SELECT * FROM reclamation";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();
        $u = new utilisateurDao();
        $d = new domaine_dao();
        $l = new lieu_dao();
        $g = new GeolocalisationDAO();
        while ($result_array = mysql_fetch_array($query_exec)) {
            $reclamation = new ReclamationEntity();
            $reclamation->setId($result_array["id"]);
            $reclamation->setTitre($result_array["titre"]);
            $reclamation->setDescription($result_array["description"]);
            $reclamation->setEtat($result_array["etat"]);
            $reclamation->setDate($result_array["date"]);
            $reclamation->setHeure($result_array["heure"]);
            $reclamation->setCitoyen($u->getUserById($result_array["idcitoyen"]));
            if ($result_array["idgeolocalisation"] != "") {
                $reclamation->setGeolocalisation($g->getGeoById($result_array["idgeolocalisation"]));
            }
            $reclamation->setlieu($l->getLieuById($result_array["idlieu"]));
            $reclamation->setdomaine($d->getDomaineById($result_array["iddomaine"]));
            $list[] = $reclamation;
        }
        return $list;
    }

    function getReclamationById($id) {
        $sql = "select * from reclamation where id = ".$id;
        $result = mysql_query($sql) or die(mysql_error());
        $u = new utilisateurDao();
        $d = new domaine_dao();
        $l = new lieu_dao();
        $g = new GeolocalisationDAO();

        if ($result_array = mysql_fetch_array($result)) {

            $reclamation = new ReclamationEntity();
            $reclamation->setId($result_array["id"]);
            $reclamation->setTitre($result_array["titre"]);
            $reclamation->setDescription($result_array["description"]);
            $reclamation->setEtat($result_array["etat"]);
            $reclamation->setDate($result_array["date"]);
            $reclamation->setHeure($result_array["heure"]);
            if ($result_array["idgeolocalisation"] != "") {
                $reclamation->setGeolocalisation($g->getGeoById($result_array["idgeolocalisation"]));
            }
            $reclamation->setCitoyen($u->getUserById($result_array["idcitoyen"]));
            $reclamation->setlieu($l->getLieuById($result_array["idlieu"]));
            $reclamation->setdomaine($d->getDomaineById($result_array["iddomaine"]));
        }
        return $reclamation;
    }

    function insertReclamation(ReclamationEntity $rec) {

        $desc = $rec->getDescription();
        $etat = $rec->getEtat();
        $titre = $rec->getTitre();


        $date = $rec->getDate();
        $heure = $rec->getHeure();


        $cit = $rec->getCitoyen()->getId();
        $dom = $rec->getdomaine()->getId();
        $geo = $rec->getGeolocalisation()->getId();
        $lieu = $rec->getlieu()->getId();


        $req = "INSERT INTO `reclamation` (`date`, `heure`, `description`, `titre`, `idcitoyen`, `iddomaine`, `etat`, `idgeolocalisation`, `idlieu`) VALUES (now(), now(), '$desc', '$titre', '$cit', '23', '$etat', '1', '19')";
        $result = mysql_query($req) or die(mysql_error());
        if ($result)
            echo "ok<br>";
        else
            echo "err<br>";
    }

    function updateReclamation($id, ReclamationEntity $rec) {

        $desc = $rec->getDescription();
        $etat = $rec->getEtat();
        $titre = $rec->getTitre();


        $date = $rec->getDate();
        $heure = $rec->getHeure();


        $cit = $rec->getCitoyen()->getId();
        $dom = $rec->getdomaine()->getId();
        $geo = $rec->getGeolocalisation()->getId();
        $lieu = $rec->getlieu()->getId();

        //$req = "UPDATE Persons SET date=$date, heure=$heure,titre=$titre,idcitoyen=$cit,iddomaine=$dom->getId(),etat=$etat,idgeolocalisation=$geo->getId(),idlieu=$lieu->getId() WHERE id=$id";
        $req = "UPDATE `tunisianwatch`.`reclamation` SET `date`=now(), `heure`=now(), `description`='$desc', `titre`='$titre', `idcitoyen`='$cit', `iddomaine`='$dom', `etat`='$etat', `idgeolocalisation`='$geo', `idlieu`='$lieu' WHERE `id`='$id'";
        $result = mysql_query($req) or die(mysql_error());
        if ($result)
            echo "modification ok";
        else
            echo "err modif";
    }

    function deleteReclamation($id) {

        $requete = " delete from reclamation where id= '$id' ; ";

        if (mysql_query($requete)) {
            echo "Utilisateur supprimée";
        } else
            echo "erreur lors de la suppression";
    }

}

?>