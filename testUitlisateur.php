<?php
include_once 'parsing/utilisateur_xmlparser.php';
if (isset($_GET["id"])) {
    $xml = new UtilisateurXMLParser($_GET["id"]);
}
else{
    $xml = new UtilisateurXMLParser(0);
}
?>
