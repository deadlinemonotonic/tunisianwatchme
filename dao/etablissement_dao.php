<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'connection/connection.php';
include_once 'dao/lieu_dao.php';
include_once 'dao/utilisateur_dao.php';
/**
 * Description of etablissement_dao
 *
 * @author Farouk
 */
class EtablissementDao {
    function __construct() {
        
    }
    
    function getAll(){
        $sql = "select * from etablissement";
        $result = mysql_query($sql) or die(mysql_error());
        $list = array();
        $l = new lieu_dao();
        $u =new utilisateurDao();
        while ($row = mysql_fetch_array($result)) {

            $domm = new EtablissementEntity();
            $domm->setId($row['id']);
            $domm->setNom($row['nom']);
            $domm->setDesc($row['description']);
            $domm->setImg($row['image']);            
            $domm->setLieu($l->getLieuById($row['idlieu']));
            $domm->setResp($u->getUserById($row['idresponsable']));
            $list[] = $domm;
        }
        return $list;
    }
    function getEtabById($id){
        $sql = "select * from etablissement where id = $id";
        $result = mysql_query($sql) or die(mysql_error());
        
        $l = new lieu_dao();
        $u =new utilisateurDao();
        if ($row = mysql_fetch_array($result)) {

            $domm = new EtablissementEntity();
            $domm->setId($row['id']);
            $domm->setNom($row['nom']);
            $domm->setDesc($row['description']);
            $domm->setImg($row['image']);            
            $domm->setLieu($l->getLieuById($row['idlieu']));
            $domm->setResp($u->getUserById($row['idresponsable']));
            
        }
        return $domm;
    }

}
?>
