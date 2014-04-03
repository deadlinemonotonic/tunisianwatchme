<?php

include_once("../connection/connection.php");
include_once("../entity/UtilisateurEntity.php");

class utilisateurDao {

    function __construct() {
        
    }

    function insertUser($user) {
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $sexe = $user->getSexe();
        $adress = $user->getAdress();
        $login = $user->getLogin();
        $mdp = $user->getMdp();
        $mail = $user->getMail();
        $type = $user->getType();
        $datenaissance = $user->getDatenaissance();

        //préparataion (dans une variable) de la requête SQL
        $requete = "insert into utilisateur (nom,prenom,sexe,adress,login,mdp,mail,type,datenaissance) "
                . "values ($nom', '$prenom', '$sexe','$adress', '$login', '$mdp', '$mail', '$type', '$datenaissance');";


        // la fonction mysql_query permet d'exécuter la requête préparée
        if (mysql_query($requete)or die(mysql_error())) {
            echo "insertion réussie";
        }
        else
            echo "erreur lors de l'insertion";
    }

    function updateUser($id, $user) {
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $sexe = $user->getSexe();
        $adress = $user->getAdress();
        $login = $user->getLogin();
        $mdp = $user->getMdp();
        $mail = $user->getMail();
        $type = $user->getType();
        $datenaissance = $user->getDatenaissance();
        $requete = "UPDATE `utilisateur` SET `nom` = '$nom', `prenom` = '$prenom', `sexe` = '$sexe',`adress` = '$adress',`login` = '$login',`mdp` = '$mdp',`mail` = '$mail',`type` = '$type',`datenaissance` = '$datenaissance' WHERE `id` ='$id';";

        if (mysql_query($requete)) {
            echo "Update réussie";
        }
        else
            echo "erreur lors de la mise à jour";
    }

    function deleteUser($id) {

        $requete = " delete from utilisateur where id= '$id' ; ";

        if (mysql_query($requete)) {
            echo "Utilisateur supprimée";
        }
        else
            echo "erreur lors de la suppression";
    }

    function getAll() {
        $query_search = "SELECT * FROM utilisateur";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();

        while ($result_array = mysql_fetch_array($query_exec)) {
            $user = new UtilisateurEntity();
            $user->setId($result_array["id"]);
            $user->setNom($result_array["nom"]);
            $user->setPrenom($result_array["prenom"]);
            $user->setMail($result_array["mail"]);
            $list[] = $user;
        }
        return $list;
    }

    function getUserById($id) {
        $query_search = "SELECT * FROM utilisateur WHERE `id` ='$id';";
        $query_exec = mysql_query($query_search) or die(mysql_error());

        $user = new UtilisateurEntity();
        if ($result_array = mysql_fetch_array($query_exec)) {

            $user->setId($result_array["id"]);
            $user->setNom($result_array["nom"]);
            $user->setPrenom($result_array["prenom"]);
            $user->setMail($result_array["mail"]);
        }
        return $user;
    }

}

$rec = new utilisateurDao();
$list = $rec->getAll();
$n = $rec->getUserById(1)->getNom();
$rec->insertUser($rec->getUserById(1));
echo "$n<br>";
foreach ($list as $item) {
    echo $item->getId() . " - " . $item->getNom() . " - " . $item->getPrenom() . " - " . $item->getMail() . "<br>";
}
?>
