<?php

include_once 'connection/connection.php';
include_once 'dao/lieu_dao.php';

class lieu_xmlparser{

    function __construct($id) {
        
        $dao = new LieuDao();
        if($id!=0){
            $list[] = $dao->getLieuById($id);
        }else{
            $list = $dao->getAll();
        }

        $this->setXML($list);
    }

    function setXML($listLieux) {
       header('Content-type: text/xml; charset=UTF-8');
        //$lieu = new LieuEntity();
        $oXMLWriter = new XMLWriter();
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');

        $oXMLWriter->startElement('lieux');


        foreach ($listLieux as $lieu) {
            $oXMLWriter->startElement('lieu');
            
            $oXMLWriter->startElement('id');
            $oXMLWriter->text($lieu->getId());
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('ville');
            $oXMLWriter->text($lieu->getVille());
            $oXMLWriter->endElement();
            
            $oXMLWriter->endElement();
        }
        $oXMLWriter->endElement();
        $oXMLWriter->endDocument();
        echo $oXMLWriter->outputMemory(TRUE);
    }

}
?>