<?php

include_once 'connection/connection.php';
include_once 'entity/CommentaireEntity.php';
include_once 'dao/utilisateur_dao.php';
include_once 'dao/reclamation_dao.php';

class commentaire_dao {

    function __construct() {
        $c = new connection();
        $c->connection();
    }

    public function Insert(CommentaireEntity $com) {
        //$com = new CommentaireEntity();
        $req = "INSERT INTO commentaire ( idreclamation , texte , idutilisateur , date )"
                . " VALUES (" . $com->getReclamation() . "," . $com->getTexte() . "," . $com->getUser() . "," . $com->getDate() . ")";
        mysql_query($req) or
                die("<br>*********** Erreur d'ajout ***********<br>");
        echo "<br>********** Ajout avec succés **********<br>";
    }

    public function Delete($id) {
        //$com = new CommentaireEntity();
        $req = "DELETE FROM commentaire WHERE id = $Id";
        mysql_query($req) or die("********** Erreur de supression **********<br>");
        echo "********** Supprission avec succés **********<br>";
    }

    public function upDate($id,  CommentaireEntity $com) {
        //$com = new CommentaireEntity();
        $req = "UPDATE commentaire SET idreclamation = ".$com->getIdReclamation()." , texte = '".$com->getTexte()."' WHERE id =$id";
        mysql_query($req) or die("********** Erreur de mise à jour **********<br>");
        echo "********** Mise à jour avec succés **********<br>";
    }

    public function getByidReclamation($id) {
        //$com = new CommentaireEntity();
        $result = mysql_query("SELECT * FROM commentaire WHERE `idreclamation` ='$id'");
        $list = array();
       
        while ($result_array = mysql_fetch_array($result)) {
            $element = new CommentaireEntity();
            $element->setId($result_array["id"]);
            $element->setReclamation($result_array["idreclamation"]);
            $element->setTexte($result_array["texte"]);
            $element->setUser($result_array["idutilisateur"]);
            $element->setDate($result_array["date"]);

            $list[] = $element;
        }
        return $list;
    }
    public function getAll() {
        $query_search = "SELECT * FROM commentaire";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();
        $rec = new reclamationDao();
        $usr = new utilisateurDao();
        $element = new CommentaireEntity();
        while ($result_array = mysql_fetch_array($query_exec)) {
            
            $element->setId($result_array["id"]);
            $element->setReclamation($rec->getReclamationById($result_array["idreclamation"]));
            $element->setTexte($result_array["texte"]);
            $element->setUser($usr->getUserById($result_array["idutilisateur"]));
            $element->setDate($result_array["date"]);

            $list[] = $element;
        }
        return $list;
    }

    public function getByid($id) {
        $result = mysql_query("SELECT * FROM commentaire WHERE `id` ='$id'");
        $list = array();
        
        $element = new CommentaireEntity();
        while ($result_array = mysql_fetch_array($result)) {
            
            $element->setId($result_array["id"]);
            $element->setReclamation($rec->setId($result_array["idreclamation"]));
            $element->setTexte($result_array["texte"]);
            $element->setUser($result_array["idutilisateur"]);
            $element->setDate($result_array["date"]);

            $list[] = $element;
        }
        return $list;
    }
}
?>
