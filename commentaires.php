<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'parsing/commentaire_xmlparser.php';
if (isset($_GET["type"])) {
    if ($_GET["type"] == "select") {
        if (isset($_GET["id"])) {
            $xml = new CommentaireXMLParser($_GET["id"]);
        }
    } else if ($_GET["type"] == "add") {
        if (isset($_GET['texte']) && isset($_GET['idutilisateur']) && isset($_GET['idreclamation']) && isset($_GET['date'])) {
            $commentaire = new CommentaireEntity();

            $commentaire->setTexte($_GET["texte"]);
            $commentaire->setUser($_GET["idutilisateur"]);
            $commentaire->setReclamation($_GET["idreclamation"]);
            $commentaire->setDate($_GET["date"]);
            

            $daoCommentaire = new commentaire_dao();
            $daoCommentaire->Insert($commentaire);
        }
    } else if ($_GET["type"] == "delete") {
        if (isset($_GET['id'])) {
            $daoCommentaire = new commentaire_dao();
            $daoCommentaire->Delete($_GET['id']);
        }
    }else if ($_GET["type"] == "update"&&isset ($_GET['id'])) {
        if (isset($_GET['texte']) && isset($_GET['idutilisateur']) && isset($_GET['idreclamation']) && isset($_GET['date'])) {
            $commentaire = new CommentaireEntity();

            $commentaire->setTexte($_GET["texte"]);
            $commentaire->setUser($_GET["idutilisateur"]);
            $commentaire->setReclamation($_GET["idreclamation"]);
            $commentaire->setDate($_GET["date"]);

            $daoCommentaire = new commentaire_dao();
            $daoCommentaire->upDate($id,$commentaire);
        }
    }
}
?>
