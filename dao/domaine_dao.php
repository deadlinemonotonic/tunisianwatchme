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

    function getDomaineById($id) {
        $sql = "select * from domaine where id = $id";
        $result = mysql_query($sql) or die(mysql_error());


        if ($row = mysql_fetch_array($result)) {

            $domm = new DomaineEntity();
            $domm->setId($row['id']);
            $domm->setNom($row['nom']);
        }
        return $domm;
    }

    function getDomaineByName($name) {
        $sql = "select * from domaine where id = '$name'";
        $result = mysql_query($sql) or die(mysql_error());


        while ($row = mysql_fetch_array($result)) {

            $domm = new DomaineEntity();
            $domm->setId($row['id']);
            $domm->setNom($row['nom']);
        }
        return $domm;
    }

    function insertDomaine(domaine_dao $domm) {
        $name = $domm->getNom();
        $result = mysql_query("insert into domaine (nom) values ('$name')") or die(mysql_error());
        if (mysql_query($result))
            echo "insertion réussie";
        else
            echo "erreur lors de l'insertion";
    }
    
    function updateDomaine($id,domaine_dao $domm) {
        $name = $domm->getNom();
        $requete = "UPDATE `domaine` SET `nom` = '$name' WHERE `id` ='$id';";

        if (mysql_query($requete)) {
            echo "Update réussie";
        }
        else
            echo "erreur lors de la mise à jour";
    }

    function deleteDomaine($id) {

        $requete = " delete from domaine where id= '$id' ; ";

        if (mysql_query($requete)) {
            echo "Utilisateur supprimée";
        }
        else
            echo "erreur lors de la suppression";
    }

}

?>
