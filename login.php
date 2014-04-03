<?php
/* Accès sécurisé à des données contenues au sein d'un répertoire spécifique.
 */
// Démarrage de la session qui va contenir le login de l'utilisateur.
session_start();
// Connexion à la base de données.
require 'connection/connection.php';

// username and password sent from form
//$myusername=$_POST['username'];
//$mypassword=$_POST['password'];

$myusername = "asma";
        $mypassword = "123" ; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM utilisateur WHERE login='$myusername' and mdp='$mypassword'";
$result=mysql_query($sql);


$count=mysql_num_rows($result);


if($count==1){

// Register $myusername, $mypassword 
$_SESSION['myusername']= $myusername;
$_SESSION['mypassword'] = $mypassword;

echo "Login Success";
}
else {
echo "Wrong Username or Password";
}
?>

