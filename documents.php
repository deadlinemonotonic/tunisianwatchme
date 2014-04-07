<?php

include_once 'parsing/document_xmlparser.php';
if(isset($_GET["id"])){
    $c = new DocumentXMLParser($_GET["id"]);
}


