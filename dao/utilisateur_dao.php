<?php

include_once("../connection/connection.php");
include_once("../entity/UtilisateurEntity.php");

class utilisateurDao {

    function __construct() {
        
    }

    function insertUser() {
                $nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$pays=$_POST['pays'];


		//préparataion (dans une variable) de la requête SQL
                $requete="insert into admin (id,nom,prenom,email,password,pays) values (NULL,'$nom', '$prenom', '$email','$password', '$pays');";


		// la fonction mysql_query permet d'exécuter la requête préparée
		if (mysql_query($requete))
		{
			echo "insertion réussie";
			
		}
		else echo "insertion echouée";
    }
    
    function updateUser() {
        
    }
    
    function deleteUser() {
        
    }
    
    function selectUsers() {
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
    
    function selectUserById() {
        
    }
    
}

$rec = new utilisateurDao();
$list = $rec->getALL();
foreach ($list as $item) {
echo $item->getId() . " - " . $item->getNom() . " - " . $item->getPrenom() . " - " . $item->getMail() . "<br>";
}
?>