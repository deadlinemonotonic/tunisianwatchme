<?php

include_once 'parsing/Login_xmlparser.php';
if (isset($_GET["login"]) && isset($_GET["password"])) {
    $xml = new LoginXMLParser($_GET["login"], $_GET["password"]);
}
?>

