<?php

include_once("../connection/connection.php");
include_once("../entity/CommentaireEntity.php");
include_once("../dao/utilisateur_dao.php");
include_once '../dao/reclamation_dao.php';

class commentaire_dao {

    function __construct() {
        $c = new connection();
        $c->connection();
    }

    public function Insert(CommentaireEntity $com) {
        //$com = new CommentaireEntity();
        $req = "INSERT INTO commentaire ( idreclamation , texte , idutilisateur , date )"
                . " VALUES (" . $com->getIdReclamation() . "," . $com->getTexte() . "," . $com->getUser() . "," . $com->getDate() . ")";
        mysql_query($req) or
                die("<br>*********** Erreur d'ajoute ***********<br>");
        echo "<br>********** Ajout avec succés **********<br>";
    }

    public function Delete($id) {
        //$com = new CommentaireEntity();
        $req = "DELETE FROM commentaire WHERE id = $Id";
        mysql_query($req) or die("********** Erreur de suprission **********<br>");
        echo "********** Supprission avec succés **********<br>";
    }

    public function upDate($id,  CommentaireEntity $com) {
        //$com = new CommentaireEntity();
        $req = "UPDATE commentaire SET idreclamation = ".$com->getIdReclamation()." , texte = '".$com->getTexte()."' WHERE id =$id";
        mysql_query($req) or die("********** Erreur de mise à jour **********<br>");
        echo "********** Mise à jour avec succés **********<br>";
    }

    public function getByIdUser(CommentaireEntity $com) {
        $user = new utilisateurDao();
        $rec = new reclamationDao();
        
        $result = mysql_query("SELECT * FROM commentaire WHERE idutilisateur = ".$id);
        $list = array();

        while ($row = mysql_fetch_array($result)) {
            $element = new CommentaireEntity();

            $element->setId($row[0]);
            $element->setReclamation($rec->getReclamationById($row[1]));
            $element->setTexte($row[2]);
            $element->setUser($user->getUserById($row[3]));
            $element->setDate($row[4]);

            $list[] = $element;
        }
        return $list;
    }

    public function getByidReclamation($id) {
        $user = new utilisateurDao();
        $rec = new reclamationDao();
        $result = mysql_query("SELECT * FROM commentaire WHERE idreclamation = ".$id);
        $list = array();

        while ($row = mysql_fetch_array($result)) {
            $element = new CommentaireEntity();
            $element->setId($row[0]);
            $element->setReclamation($rec->getReclamationById($row[1]));
            $element->setTexte($row[2]);
            $element->setUser($user->deleteUser($row[3]));
            $element->setDate($row[4]);

            $list[] = $element;
        }
        return $list;
    }

    public function getAll() {
        $user = new utilisateurDao();
        $rec = new reclamationDao();
        
        $result = mysql_query("SELECT * FROM commentaire");
        $list = array();
        while ($row = mysql_fetch_array($result)) {
            $element = new CommentaireEntity();
            
            $element->setId($row[0]);
            $element->setReclamation($rec->getReclamationById($row[1]));
            $element->setTexte($row[2]);
            $element->setUser($user->getUserById($row[3]));
            $element->setDate($row[4]);

            $list[] = $element;
        }
        return $list;
    }

}

        
?>
