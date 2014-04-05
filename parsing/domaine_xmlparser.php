<?php

include_once 'connection/connection.php';
include_once 'dao/domaine_dao.php';

class domaine_xmlparser {

    function __construct() {
        $dao = new domaine_dao();
        $list = $dao->getALL();
        $this->setXML($list);
        
    }

    function setXML($listDomaines) {
        header('Content-type: text/xml; charset=UTF-8');
        $domaine = new DomaineEntity();
        $oXMLWriter = new XMLWriter();
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');

        $oXMLWriter->startElement('domaines');


        foreach ($listDomaines as $domaine) {
            $oXMLWriter->startElement('domaine');
            $oXMLWriter->startElement('id');
            $oXMLWriter->text($domaine->getId());
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('nom');
            $oXMLWriter->text($domaine->getNom());
            $oXMLWriter->endElement();
            $oXMLWriter->endElement();
        }
        $oXMLWriter->endElement();
        $oXMLWriter->endDocument();
        echo $oXMLWriter->outputMemory(TRUE);
    }

}
?>