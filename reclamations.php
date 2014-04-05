<?php
include_once 'parsing/reclamation_xmlparser.php';
if (isset($_GET["id"])) {
    $xml = new ReclamationXMLParser($_GET["id"]);
}
else{
    $xml = new ReclamationXMLParser(0);
}
?>