<?php

include_once 'connection/connection.php';
include_once 'entity/LieuEntity.php';

class LieuDao {

    function __construct() {
        
    }

    function getAll() {
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

    function getLieuById($id) {
        $sql = "select * from lieu where id = $id";
        $result = mysql_query($sql) or die(mysql_error());


        if ($row = mysql_fetch_array($result)) {

            $domm = new LieuEntity();
            $domm->setId($row['id']);
            $domm->setVille($row['ville']);
        }
        return $domm;
    }

    function getDomaineByVille(lieu_dao $ville) {
        $sql = "select * from domaine where id = '$ville'";
        $result = mysql_query($sql) or die(mysql_error());


        while ($row = mysql_fetch_array($result)) {

            $domm = new DomaineEntity();
            $domm->setId($row['id']);
            $domm->setNom($row['nom']);
        }
        return $domm;
    }

    function insertLieu(lieu_dao $lie) {
        $ville = $lie->getVille();
        $result = mysql_query("insert into domaine (ville) values ('$ville')") or die(mysql_error());
        if (mysql_query($result))
            echo "insertion réussie";
        else
            echo "erreur lors de l'insertion";
    }

    function updateLieu($id,lieu_dao $lie) {
        $ville = $lie->getVille();
        $requete = "UPDATE `domaine` SET `ville` = '$ville' WHERE `id` ='$id';";

        if (mysql_query($requete)) {
            echo "Update réussie";
        }
        else
            echo "erreur lors de la mise à jour";
    }

    function deleteLieu($id) {

        $requete = " delete from lieu where id= '$id' ; ";

        if (mysql_query($requete)) {
            echo "Utilisateur supprimée";
        }
        else
            echo "erreur lors de la suppression";
    }

}
?>
