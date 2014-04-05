<?php
include_once 'parsing/commentaire_xmlparser.php';
if (isset($_GET["id"])) {
    $xml = new CommentaireXMLParser($_GET["id"]);
}
else{
    $xml = new CommentaireXMLParser(1);
}
?>
