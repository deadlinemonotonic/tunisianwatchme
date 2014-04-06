<?php

include_once 'dao/document_dao.php';

class ReclamationXMLParser {

    function __construct($id) {
        $dao = new DocumentDao();
        if ($id == 0) {
            $list = $dao->getReclamationById($id);
        }
        $this->setXML($list);
    }

    function setXML($list) {
        header('Content-type: text/xml; charset=UTF-8');
        $oXMLWriter = new XMLWriter;
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');
        $oXMLWriter->startElement('documents');
            $document = new DocumentEntity();
            foreach($list as $document){
                $oXMLWriter->startElement('document');
                    $oXMLWriter->startElement('nom');
                           $oXMLWriter->text($document->getNom());
                    $oXMLWriter->endElement();
                    $oXMLWriter->startElement('content');
                           $oXMLWriter->text(base64_encode($document->getContent()));
                    $oXMLWriter->endElement();        
                $oXMLWriter->endElement();
            }
            
        $oXMLWriter->endElement();
    }

}
