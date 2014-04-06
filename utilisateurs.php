<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utilisateur
 *
 * @author Farouk
 */
include_once 'parsing/Utilisateur_xmlparser.php';
if (isset($_GET["type"])) {
    if ($_GET["type"] == "select") {
        if (isset($_GET["id"])) {
            $xml = new UtilisateurXMLParser($_GET["id"]);
        } else {
            $xml = new UtilisateurXMLParser(0);
        }
    } else if ($_GET["type"] == "add") {
        if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['sexe']) && isset($_GET['login']) && isset($_GET['mdp']) && isset($_GET['mail'])) {
            $utilisateur = new UtilisateurEntity();

            $utilisateur->setNom($_GET["nom"]);
            $utilisateur->setPrenom($_GET["prenom"]);
            $utilisateur->setSexe($_GET["sexe"]);
            $utilisateur->setLogin($_GET["login"]);
            $utilisateur->setMdp($_GET["mdp"]);
            $utilisateur->setMail($_GET["mail"]);
            $utilisateur->setType('c');
            if (isset($_GET["photo"]))
                $utilisateur->setPhoto($_GET["photo"]);
            else
                $utilisateur->setPhoto(null);
            if (isset($_GET["adress"]))
                $utilisateur->setAdress($_GET["adress"]);
            else
                $utilisateur->setAdress(null);
            if (isset($_GET["datedenaissance"]))
                $utilisateur->setDatenaissance($_GET["datedenaissance"]);
            else
                $utilisateur->setDatenaissance(null);

            $daoUtilisateur = new utilisateurDao();
            $daoUtilisateur->insertUser($utilisateur);
        }
    } else if ($_GET["type"] == "delete") {
        if (isset($_GET['id'])) {
            $daoUtilisateur = new utilisateurDao();
            $daoUtilisateur->deleteUser($_GET['id']);
        }
    }else if ($_GET["type"] == "update"&&isset ($_GET['id'])) {
        if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['sexe']) && isset($_GET['login']) && isset($_GET['mdp']) && isset($_GET['mail'])) {
            $utilisateur = new UtilisateurEntity();

            $utilisateur->setNom($_GET["nom"]);
            $utilisateur->setPrenom($_GET["prenom"]);
            $utilisateur->setSexe($_GET["sexe"]);
            $utilisateur->setLogin($_GET["login"]);
            $utilisateur->setMdp($_GET["mdp"]);
            $utilisateur->setMail($_GET["mail"]);
            $utilisateur->setType('c');
            if (isset($_GET["photo"]))
                $utilisateur->setPhoto($_GET["photo"]);
            else
                $utilisateur->setPhoto(null);
            if (isset($_GET["adress"]))
                $utilisateur->setAdress($_GET["adress"]);
            else
                $utilisateur->setAdress(null);
            if (isset($_GET["datedenaissance"]))
                $utilisateur->setDatenaissance($_GET["datedenaissance"]);
            else
                $utilisateur->setDatenaissance(null);

            $daoUtilisateur = new utilisateurDao();
            $daoUtilisateur->updateUserUser($id,$utilisateur);
        }
    }
}
?>
